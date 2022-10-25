<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function getFavorites($user_id){
        $favs=Favorite::where("user_id",$user_id)->with("meal.category","meal.reviews")->get();

        return response()->json([
           "favs"=>$favs,
        ]);
    }

    public function addToFavorites(Request $request){
        $fav=Favorite::where("user_id",$request->user_id)->where("meal_id",$request->meal_id)->first();
        if (empty($fav)){
            $fav=Favorite::create([
                "user_id"=>$request->user_id,
                "meal_id"=>$request->meal_id,
            ]);
        }else{
            DB::delete("DELETE FROM favorites WHERE user_id=? AND meal_id=? ",[$request->user_id,$request->meal_id]);
        }

        return response()->json([
            "Data"=>$fav,
        ]);
    }
}
