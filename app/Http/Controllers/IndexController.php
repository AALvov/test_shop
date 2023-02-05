<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke(Request $request)
    {

        $categories = Category::all();
        $cat = [];
        foreach ($categories as $category) {
            $cat[$category->name]['count'] = $category->reviews()->count();
            $cat[$category->name]['slug'] = $category->slug;
            $cat[$category->name]['id'] = $category->id;
        }
        arsort($cat);

        if (isset($_COOKIE['favorite_id'])) {
            $favorite = explode(',', $request->cookie('favorite_id'));

            $data = Product::whereIn('id', $favorite)->get();

//            dd($cat);
            return view('index', compact('data', 'cat'));
        } else {
            return view('index', compact('cat'));
        }
    }
}
