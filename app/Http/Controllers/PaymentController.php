<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Models\ParentLottery;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Input;
use PayPal\Auth\OAuthTokenCredential;
use App\Notifications\SuccessFullyEnteredDraw;

class PaymentController extends Controller
{
    public function __construct()
    {
        /*
        * PayPal api context
        */
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                        $paypal_conf['client_id'],
                        $paypal_conf['secret']
                ));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }


    public function payWithpaypal(Request $request, ParentLottery $parentLottery)
    {
        // return $request->all();
        $paypal_conf = \Config::get('paypal');
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        /** item name **/
        $item_1->setName($parentLottery->name)
                        ->setCurrency($paypal_conf['curreny'])
                        ->setQuantity(1)
                        ->setPrice($parentLottery->entryInPound());
        
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency($paypal_conf['curreny'])
                        ->setTotal($parentLottery->entryInPound());
        $transaction = new Transaction();
        $transaction->setAmount($amount)
                        ->setItemList($item_list)
                        ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();

        /* Specify return URL  */
        $redirect_urls->setReturnUrl(route('paypal.store', ['parentLottery' => $parentLottery->id]))
                        ->setCancelUrl(route('paypal.store', ['parentLottery' => $parentLottery->id]));
        $payment = new Payment();
        $payment->setIntent('Sale')
                        ->setPayer($payer)
                        ->setRedirectUrls($redirect_urls)
                        ->setTransactions(array($transaction));
        $payment->setExperienceProfileId($paypal_conf['webprofile']);
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
        
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        Session::put('result', $request->result);
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }

    public function store(Request $request, ParentLottery $parentLottery)
    {
        $currentLottery = $parentLottery->currentLottery;
        $user = auth()->user();
        
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $game_result = Session::get('result');
        
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        Session::forget('result');
        
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            alert()->error("Payment failed")->autoclose('3000');
            return redirect('/county-draw');
        }
        
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {
            $transaction  = $user->transactions()->create([
                'charge_id' => $payment_id,
                'lottery_id' => $currentLottery->id,
                'amount' => $currentLottery->entry_fee,
            ]);
            
            $draw = $user->lotteries()->create([
                'lottery_id' => $currentLottery->id,
                'lottery_transaction_id' => $transaction->id,
                'result' => $game_result,
                'draw_number' => sprintf('%010d', mt_rand(0, 9999999999))
            ]);
            
            $user->notify(new SuccessFullyEnteredDraw($draw));
            alert()->success("Payment successful")->autoclose('3000');
            return redirect('/transactions');
        }

        alert()->error("Payment failed")->autoclose('3000');
        return redirect('/county-draw');
    }
}
