<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Http\Controllers\Controller;

class CountyDrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotteries = Lottery::oldest()->with('winner')->withCount('participants')->get();
        // return $lotteries;
        return view('admin.lotteries.child_lotteries.index', compact('lotteries'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function participants(Lottery $countyDraw)
    {
        $lottery = $countyDraw->load(['participants' => function ($query) {
            $query = $query->withCount('lotteries');
        }], 'winner');
        // return $lottery;
        return view('admin.lotteries.child_lotteries.participants', compact('lottery'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function winner(Lottery $countyDraw)
    {
        if ($countyDraw->hasWinner()) {
            $lottery = $countyDraw->load(['winner' => function ($q) {
                $q = $q->withCount('lotteries');
            }]);
            return view('admin.lotteries.child_lotteries.winner', compact('lottery'));
        }
        return redirect('admin/county-draws');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approvePrize(Lottery $countyDraw)
    {
        if ($countyDraw->hasWinner() && !$countyDraw->prize_money_approved) {
            $countyDraw->update([
                'prize_money_approved' => true
            ]);

            $countyDraw->approvals()->create([
                'user_id' => $countyDraw->winner_id
            ]);

            $winner = $countyDraw->winner;

            $status = $winner->update([
                'balance' => $winner->balance + $countyDraw->prize
            ]);

            return back();
        }

        return redirect('/admin/county-draws');
    }
}
