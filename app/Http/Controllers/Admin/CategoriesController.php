<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index () {
    	return 'admin categories~!!!';
    }

    public function create () {
    	return view('admin.category_add');
    }

    public function store () {
    	$request = request();

    	$v = Validator::make($request->all(), [
    		'name' => 'required|string|min:2|max:50',
    		'available' => 'required|boolean'
    	]);

    	if ($v->fails()) {
    		return response([
    			'errors' => $v->messages()
    		], 422);
    	}

    	Category::insert([
    		'name' => $request->name,
    		'available' => $request->available
    	]);
    }
}
