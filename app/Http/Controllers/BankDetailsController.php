<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankDetailsController extends Controller
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

    public function edit()
    {
        $user = auth()->user()->load('bankDetail');
        return view('bank_details.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validatedData = $this->validate($request, [
            'bank_name' => 'required',
            'sort_code' => 'required',
            'account_number' => 'required',
        ]);

        auth()->user()->bankDetail->update($validatedData);

        $request->session()->flash('details', 'Bank Details Updated');

        return back();
    }
}
