<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index () {
    	if (request()->category_id) {
    		$products = Product::where('category_id', request()->category_id)->get();
    	} else {
    		$products = Product::get();
    	}

    	return view('admin.products')->with([
    		'products' => $products
    	]);
    }
}
