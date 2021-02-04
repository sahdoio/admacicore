<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller {

    function __construct($Cache = null) {
        //...
    }

    public function index() {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }
    
    public function in(Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $status = Auth::attempt($credentials);
        if ($status)
            return redirect()->route('admin.dashboard');
        
        return redirect()->route('admin.login');
    }

    public function out() {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
