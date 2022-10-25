<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function meals()
    {
        return response()->json([
            "meals"=>Meal::with("category","reviews")->get(),
        ]);
    }
}
