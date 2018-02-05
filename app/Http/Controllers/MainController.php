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
        // alert()->info('Reached Limit of 5 Times');
        alert()->info('Reached Limit of 5 Times')->autoclose('3000');
        return redirect('/county-draw');
    }
}
