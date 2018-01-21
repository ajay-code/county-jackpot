<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParentLottery;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class PurchasesLotteryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created purchase in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ParentLottery $parentLottery)
    {
        $currentLottery = $parentLottery->currentLottery();
        $user = auth()->user();
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);

        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => $currentLottery->entry_fee,
            'currency' => 'usd',
        ]);


        $transaction  = $user->transactions()->create([
            'charge_id' => $charge->id,
            'lottery_id' => $currentLottery->id,
            'amount' => $charge->amount,
        ]);

        $draw = $user->lotteries()->create([
            'lottery_id' => $currentLottery->id,
            'lottery_transaction_id' => $transaction->id,
            'result' => $request->result,
            'draw_number' => sprintf('%010d', mt_rand(0, 9999999999))
        ]);

        return $draw;
    }
}
