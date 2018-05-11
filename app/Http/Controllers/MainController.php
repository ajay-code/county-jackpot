<?php

namespace App\Http\Controllers;

use Notification;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Customer;
use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use Illuminate\Mail\Markdown;
use App\Notifications\TestNotice;
use App\Notifications\WinnerEmail;
use App\Notifications\ResultDeclared;

class MainController extends Controller
{
    public function index()
    {
        $lotteries = ParentLottery::NotExpired()->whereNotNull('county_id')->get();
        $globalLotteries = ParentLottery::NotExpired()->whereNull('county_id')->get();
        $lotteries->load('currentLottery');
        $globalLotteries->load('currentLottery');
        $featured = ParentLottery::featured()->first();
        return view('welcome', compact('lotteries', 'globalLotteries', 'featured'));
    }

    public function results()
    {
        $lotteries = ParentLottery::has('resultLottery')->with('resultLottery.winner', 'resultLottery.winnerDraw')->WithCount('resultLottery')->orderBy('updated_at', 'desc')->get();
        $results_count = $lotteries->each->resultLottery->pluck('result_lottery_count')->sum();
        return view('results', compact('lotteries', 'results_count'));
    }

    public function game()
    {
        return view('game');
    }

    public function test()
    {
        $markdown = new Markdown(view(), config('mail.markdown'));
        $user = User::first();
        $countyDraw = Lottery::first();
        return $markdown->render('mail.withdrawal', compact('user', 'countyDraw'));
    }

    public function test_payment(Request $request)
    {
        // dd($request->all());
        Stripe::setApiKey(config('services.stripe.secret'));

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);

        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => 2000,
            'currency' => 'gbp',
        ]);

        return 'done';
    }
}
