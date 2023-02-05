<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function add(Request $request, $id)
    {
        $data = $request->all();
        $data['product_id'] = $id;
        Review::create($data);
        return back();
    }


}
