<?php

namespace App\Http\Controllers;

use Stripe\{Stripe, charge, Customer};
use App\Models\Lottery;
use Illuminate\Http\Request;

class PurchasesLotteryController extends Controller
{

    /**
     * Store a newly created purchase in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lottery $lottery)
    {
        // return $request->all();
        $user = auth()->user();
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);

        Charge::create([
            'customer' => $customer->id,
            'amount' => $lottery->entry_fee * 100,
            'currency' => 'usd',
        ]);

        return 'All Dome';
    } 
}
