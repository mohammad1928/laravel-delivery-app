<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $users=User::all();
        $categories=Category::all();
        $meals=Meal::all();
        $orders=Order::all();
        return view("index", compact("users","categories", "meals", "orders"));
    }


}
