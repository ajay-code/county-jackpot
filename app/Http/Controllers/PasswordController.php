<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
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
     * Get password form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        $user = Auth::user();
        return view('profile.password.edit', compact('user'));
    }
    
    /**
     * Set password for first time.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function set(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        
        // alert()->success('Password Successfully Set');
        $request->session()->flash('pwd', 'Password successfully set');

        return back();
    }

    /**
     * Change password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|old_password',
            'password' => 'required|string|min:6|confirmed',
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);

        // alert()->success('Password Successfully Set');
        $request->session()->flash('pwd', 'Password successfully changed');
        
        return back();
    }
}
