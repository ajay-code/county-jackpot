<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceAppeovalConyroller extends Controller
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

    public function balance()
    {
        $user = auth()->user()->load(['approvals' => function ($q) {
            $q = $q->with('lottery')->limit(6);
        }, 'bankDetail']);

        // return $user;

        return view('profile.balance', compact('user'));
    }

    public function log()
    {
        $approvals = auth()->user()->approvals()->with('lottery')->paginate();
        return view('profile.log', compact('approvals'));
    }
}
