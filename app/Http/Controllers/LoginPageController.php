<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;

class LoginPageController extends Controller
{
	public function index(){
		return view('login');
	}

	public function process(){
		$request = request();

		$v = Validator::make($request->all(), [
			'email' => 'required|string|email|exists:users,email|min:10|max:100',
			'password' => 'required|string|min:4|max:50'
		]);

		session()->flash('data', request()->all());
		
		if ($v->fails()) {
			session()->flash('errors', $v->messages()->toArray());
			return redirect('/login');
		}


		$user = User::where('email', $request->email)->first();

		if (!$user->verified) {
			session()->flash('error', 'Your email is not verified!');
			return back();
		}

		if ($user->password == $request->password) {
			Auth::login($user, true);
			return redirect('/home');
		} else {
			session()->flash('error', 'your password is not correct.');
			return back();
		}
	}

	public function logout () {
		Auth::logout();
		return redirect('/login');
	}
}
