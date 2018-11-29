<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store() {

		$request = request();

		$v = Validator::make($request->all(), [
			'first_name' => 'required|string|min:2|max:50',
			'last_name' => 'required|string|min:2|max:50',
			'email' => 'required|string|min:10|max:100|unique:users,email',
			'password' => 'required|string|min:4|max:50',
			'gender' => 'required|string|in:female,male'
		]);

		if ($v->fails()) {
			session()->flash('errors', $v->messages()->toArray());
			return redirect('/login');
		}


		$a = new User;
		$a->first_name = $request->first_name;
		$a->last_name = $request->last_name;
		$a->email = $request->email;
		$a->password = $request->password;
		$a->gender = $request->gender;

		$a->save();

		session()->flash('success', 'You have registered successfully, please login!!');

		return redirect('/login');
	}
}
