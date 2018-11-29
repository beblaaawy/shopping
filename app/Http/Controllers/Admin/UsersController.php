<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index () {
		$users = User::get();

    	return view('admin.users')->with([
    		'users' => $users
    	]);
    }
}
