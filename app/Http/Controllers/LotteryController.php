<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Models\LotteryTransaction;

class LotteryController extends Controller
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
     * Buy ParentLottery
     */
    public function index()
    {
        $lotteries = ParentLottery::notExpired()->get();
        $lotteries->load('currentLottery');
        // return $lotteries;
        return view('lottery.index', compact('lotteries'));
    }

    /**
     * Buy ParentLottery
     *
     * @param \App\Models\ParentLottery
     */
    public function buy(ParentLottery $parentLottery)
    {
        return view('lottery.buy', compact('parentLottery'));
    }

    /**
     * Game
     *
     * @param \App\Models\ParentLottery
     */
    public function game(ParentLottery $parentLottery)
    {
        return view('lottery.game.index', compact('parentLottery'));
    }
    
    /**
     * Play Game
     *
     * @param \App\Models\LotteryTransaction
     */
    public function play(ParentLottery $parentLottery)
    {
        return view('lottery.game.play', compact('parentLottery'));
    }
}
