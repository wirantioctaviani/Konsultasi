<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
	    {
	    	return view('admin.login');
	    }

	// public function postlogin(Request $request)
	// 	{
	// 		#dd($request->all());
	// 		if(Auth::attempt($request->only('email', 'password')))
	// 			{
	// 				return redirect()->action('App\Http\Controllers\AdminController@dashboard');
	// 			}
	// 		else
	// 			{
	// 				return redirect()->action('App\Http\Controllers\AuthController@login');
	// 			}
	// 	}

	public function logout()
	    {
	    	Auth::logout();
	    	return view('admin.login');
	    }
}
