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
        return view('welcome', compact('lotteries', 'featured'));
    }

    public function results()
    {
        $lotteries = ParentLottery::with('resultLottery.winner', 'resultLottery.winnerDraw')->get();
        // return $lotteries;
        return view('results', compact('lotteries'));
    }

    public function game()
    {
        return view('game');
    }

    public function test()
    {
        $lottery = Lottery::find(2);
        $user = User::find(1);
        $participants = $lottery->participants->unique();
        $participants = $participants->keyBy('id');
        $participants = $participants->forget($user->id);
        $user->notify(new WinnerEmail($lottery, $user));
        Notification::send($participants, new ResultDeclared($lottery));
        return $participants;
    }
}
