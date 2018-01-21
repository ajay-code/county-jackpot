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
}
