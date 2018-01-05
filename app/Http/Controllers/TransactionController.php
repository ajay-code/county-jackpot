<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
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
     * List of all the Transactions
     */
    public function index(){
        $user = auth()->user()->load('transactions.lottery');
        $transactions = $user->transactions;
        // return $transactions;
        return view('transactions.index', compact('transactions', 'user'));
    }

    
}
