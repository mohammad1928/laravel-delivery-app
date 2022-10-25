<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
       $user=User::create([
           'first_name' => $request->first_name,
           'last_name' => $request->last_name,
           'email' => $request->email,
           "password"=>Hash::make($request->password),
       ]);
       $token=$user->createToken("auth-token")->plainTextToken;
        return response()->json(
            [
                "token"=>$token,
                "user"=>$user,
            ]
        );
    }

    public function login(Request $request)
    {
        $credentials = request(["email","password"]);
        if(!Auth::attempt($credentials)){
            return response()->json([
                "message"=>"login failed",
            ],203);
        }
        else{
            $user=User::where("email",$request->email)->first();
            $token=$user->createToken("auth-token")->plainTextToken;
            return response()->json([
                "token"=>$token,
                "user_id"=>$user->id,
            ]);
        }
    }

    public function logout(Request $request)
    {
        $user=User::find($request->id);
        $isLoggedOut=$user->tokens()->delete();

        return response()->json([
            "message"=>$isLoggedOut,
        ]);
    }

    public function getUserCart($id)
    {
        $cart = Cart::where("user_id",$id)->with("items.meal")->orderBy("created_at","ASC")->get();
        return response()->json([
            "cart"=>$cart,
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            "user_id"=>"required",
            "meal_id"=>"required",
        ]);

        $cart=Cart::where("user_id",$request->user_id)->first();
        if(empty($cart))
        {
            $cart=Cart::create([
              "user_id"=>$request->user_id,
            ]);
            $item=Item::create([
                "cart_id"=>$cart->id,
                "meal_id"=>$request->meal_id,
            ]);
        }
        else {
            $cart=Cart::where("user_id",$request->user_id)->first();
            $item=Item::create([
                "cart_id"=>$cart->id,
                "meal_id"=>$request->meal_id,
            ]);
        }
        return response()->json([
            "item"=>$item,
        ]);
    }

    public function removeItem($item_id)
    {
        $item=Item::find($item_id);
        $item->delete();

        return response()->json([
            "message"=>"Item removed successfully",
        ]);
    }

    public function confirmOrder(Request $request){
        $cart=Cart::where("user_id",$request->user_id)->first();
        $cartItems = json_decode(json_encode($request->cart_items), FALSE);
        $sum=0;

        $order=Order::create([
            "user_id"=>$request->user_id,
            "lat"=>$request->lat,
            "lng"=>$request->lng,
            "notes"=>$request->notes,
        ]);
        foreach ($cartItems as $item){
            $sum+=$item->quantity*$item->meal->price;
            OrderItem::create([
                "order_id"=>$order->id,
                "meal_id"=>$item->meal_id,
                "quantity"=>$item->quantity,
            ]);
        }
        $order->total=$sum;
        $order->save();

        $items=Item::where("cart_id",$cart->id)->with("meal")->get();
        foreach ($items as $citem){
            $citem->delete();
        }
        return response()->json([
            "data"=>$cartItems[0]->meal,
        ]);
    }

    public function getMyOrders($id){
        $orders=Order::where("user_id",$id)->with("items.meal")->get();
        return response()->json([
           "orders"=>$orders,
        ]);
    }

}
