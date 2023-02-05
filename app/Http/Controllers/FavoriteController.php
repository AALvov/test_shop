<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function add(Request $request, $id)
    {
        $favorite_id = $request->cookie('favorite_id');
        if (!$favorite_id) {
            return back()->cookie('favorite_id', $id, 525600);
        } else {

            $new_favorite = explode(',', $favorite_id);
            array_push($new_favorite, $id);
            return back()->cookie('favorite_id', implode(',', $new_favorite), 525600);
        }
    }

    public function delete(Request $request, $id)
    {
        $favorite_id = explode(',', $request->cookie('favorite_id'));
        unset($favorite_id[array_search($id, $favorite_id)]);
        return back()->cookie('favorite_id', implode(',', $favorite_id), 525600);

    }

}
