<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\ProductReview;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
	public function index ($id) {
		$product = Product::find($id);

		if (!$product) {
			return redirect('/home');
		}

		if ($product->available == 0 && Auth::check() && Auth::user()->role != 'admin') {
			return redirect('/home');
		}

		$reviews = ProductReview::where('product_id', $id)->where('approved', 1)->get();
		$reviewAvg = ProductReview::where('product_id', $id)->where('approved', 1)->avg('rate');
		$reviewCount = ProductReview::where('product_id', $id)->where('approved', 1)->count();

		return view('product_details')->with(compact('id', 'product', 'reviewAvg', 'reviews', 'reviewCount'));
	}
}
