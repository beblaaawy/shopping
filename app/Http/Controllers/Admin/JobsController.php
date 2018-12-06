<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobsController extends Controller
{
    public function index() {
    	return view('admin.jobs');
    }

    public function getJson () {

    	$request = request();

    	$page = 1;
    	$amount = 25;

    	if ($request->page && is_numeric($request->page)) {
    		$page = $request->page;
    	}

    	if ($request->amount && is_numeric($request->amount) && in_array($request->amount, [10, 25, 50, 100, 200])) {
    		$amount = (int) $request->amount;
    	}

    	$offset = ($page - 1) * $amount;

    	$jobs = Job::limit($amount)->offset($offset)->get();

    	return [
    		'jobs' => $jobs,
    		'total' => Job::count(),
    		'amount' => $amount
    	];
    }
}
