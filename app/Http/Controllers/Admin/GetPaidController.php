<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\GetPaid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetPaidController extends Controller
{
    public function index()
    {
        $getPaids = GetPaid::with('user.bankDetail')->latest()->get();
        return view('admin.get_paid.index', compact('getPaids'));
    }

    public function approve(GetPaid $payment)
    {
        $payment->update([
            'status' => true,
            'approved_on' => Carbon::now()
        ]);
        
        

        return back();
    }
}
