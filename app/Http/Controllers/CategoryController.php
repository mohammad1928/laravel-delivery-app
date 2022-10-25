<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class CategoryController extends Controller
{
    public  function categories(){
        return response()->json([
            "categories"=>Category::all(),
        ]);
    }
}
