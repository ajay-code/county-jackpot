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
        $parentLottery->load('currentLottery');
        
        $user = auth()->user();
        
        $user->load(['lotteries' => function ($q) use ($parentLottery) {
            $q = $q->where('lottery_id', $parentLottery->currentLottery->id);
        }]);

        if ($user->lotteries->count() > 5) {
            alert()->info('Reached Limit of 5 Times')->autoclose('3000');
            return back();
        }
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
