<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Product;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

	public function index () {

		$categories = Category::where('available', 1)->get();

		$products = Product::where('available', 1);

		if (request()->category_id) {
			$products->where('category_id', request()->category_id);
		}

		$products = $products->get();

		$offers = Offer::where('available', 1)->where('expires_on', '>', Carbon::now())->get();

	    return view('home')->with([
	    	'categories' => $categories,
	    	'products' => $products,
	    	'offers' => $offers
	    ]);
	}
}
