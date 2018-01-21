<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLotteryController extends Controller
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
     * List of all the UserLotteries
     */
    public function index()
    {
        $user = auth()->user();
        $user->load(['lotteries' => function ($q) {
            $q = $q->with('lottery')->latest();
        }])->get();
        // return $user;
        return view('user_lotteries.index', compact('user'));
    }
}
