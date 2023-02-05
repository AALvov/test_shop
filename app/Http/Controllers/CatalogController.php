<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $data = Category::orderby('id')->get();
        return view('shop.index', compact('data'));
    }

    public function category(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (isset($request->sort)) {
            switch ($request->sort) {
                case 'popularity':
                    $products = Product::where('category_id', $category->id)->withCount('reviews')->orderby('reviews_count', 'desc')->get();
                    return view('shop.category', compact('category', 'products'));
                    break;
                case 'date_new':
                    $products = Product::where('category_id', $category->id)->orderby('created_at', 'desc')->get();
                    return view('shop.category', compact('category', 'products'));
                    break;
                case 'date_old':
                    $products = Product::where('category_id', $category->id)->orderby('created_at', 'asc')->get();
                    return view('shop.category', compact('category', 'products'));
                    break;
                default:
                    $products = Product::where('category_id', $category->id)->orderby('id')->get();
                    return view('shop.category', compact('category', 'products'));
                    break;
            }
        } else {
            $products = Product::where('category_id', $category->id)->orderby('id')->get();
            return view('shop.category', compact('category', 'products'));
        }


    }


    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('shop.product', compact('product'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $request->validate([
            'search' => 'required',
        ]);
        $products = Product::where('name', 'LIKE', "%{$search}%")->paginate(5);
        $categories = Category::where('name', 'LIKE', "%{$search}%")->paginate(5);
        return view('shop.search_result', compact('products', 'categories', 'search'));
    }

}
