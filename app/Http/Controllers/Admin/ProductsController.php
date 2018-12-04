<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use App\Product;
use App\Category;
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

    public function create () {
        $categories = Category::all();

        return view('admin.product_add')->with([
            'categories' => $categories
        ]);
    }

    public function store () {
        $request = request();

        $v = Validator::make($request->all(), [
            'title' => 'required|string|min:10|max:200',
            'description' => 'string|min:10|max:2000',
            'quantity' => 'required|numeric',
            'type' => 'string|in:new,sale,offer',
            'category_id' => 'required|numeric|exists:categories,id',
            'price' => 'required|numeric',
            'brand' => 'required|string|min:2|max:200',
            'available' => 'required|boolean',
            // 'avatar' => 'required|file|image|size:1000'
        ]);

        if ($v->fails()) {
            return response(['errors' => $v->messages()], 422);
        }

        Product::insert([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'available' => $request->available,
            'brand' => $request->brand
        ]);
    }
}
