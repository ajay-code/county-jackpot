<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;

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
     * Buy Lottery
     */
    public function index()
    {
        $lotteries = Lottery::active()->get();
        return view('lottery.index', compact('lotteries'));
    }

    /**
     * Buy Lottery
     *
     * @param \App\Models\Lottery
     */
    public function buy(Lottery $lottery)
    {
        return view('lottery.buy', compact('lottery'));
    }

}
