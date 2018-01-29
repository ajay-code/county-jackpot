<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Notifications\TestNotice;
use App\Notifications\WinnerEmail;
use App\Notifications\ResultDeclared;

class MainController extends Controller
{
    public function index()
    {
        $lotteries = ParentLottery::NotExpired()->get();
        $lotteries->load('currentLottery');
        $featured = ParentLottery::featured()->first();
        if (!$featured) {
            $featured = ParentLottery::first();
        }
        return view('welcome', compact('lotteries', 'featured'));
    }

    public function results()
    {
        $lotteries = ParentLottery::with('resultLottery.winner', 'resultLottery.winnerDraw')->WithCount('resultLottery')->get();
        $results_count = $lotteries->each->resultLottery->pluck('result_lottery_count')->sum();
        return view('results', compact('lotteries', 'results_count'));
    }

    public function game()
    {
        return view('game');
    }

    public function test()
    {
        $lottery = Lottery::find(2);
        $user = User::find(1);
        $user->notify(new TestNotice);
        return $user;
    }
}
