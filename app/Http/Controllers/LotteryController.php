<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;

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

}
