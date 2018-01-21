<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lottery;
use Illuminate\Http\Request;
use App\Models\ParentLottery;
use App\Http\Controllers\Controller;

class LotteryLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotteries = Lottery::oldest()->get();
        return view('admin.lotteries.log.index', compact('lotteries'));
    }
}
