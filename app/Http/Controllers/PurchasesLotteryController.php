<?php

namespace App\Http\Controllers;

use Stripe\{Stripe, charge, Customer};
use App\Models\Lottery;
use Illuminate\Http\Request;

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
    public function store(Request $request, Lottery $lottery)
    {
        $user = auth()->user();
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);

        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => $lottery->entry_fee * 100,
            'currency' => 'usd',
        ]);


        $user->transactions()->create([
            'charge_id' => $charge->id,
            'lottery_id' => $lottery->id,
            'amount' => $charge->amount,
            ]);

        return 'All Dome';
    } 
}
