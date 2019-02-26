<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:admin');
	}

    public function login(Request $request){
    	$request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
    }

    public function index(){
    	return view("auth.admin-login");
    }
}
