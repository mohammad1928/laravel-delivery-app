<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getPosts(Request $request){
        $posts=Post::with("images","likes.user")->get();

        return response()->json([
           "posts"=>$posts,
        ]);
    }
    public function likePost(Request $request){
        $like=PostLike::where("user_id",$request->user_id)->where("post_id",$request->post_id)->first();
        if (empty($like)){
            $like=PostLike::create([
                "user_id"=>$request->user_id,
                "post_id"=>$request->post_id,
            ]);
        }else{
            $like=DB::delete("DELETE FROM post_likes WHERE user_id=? AND post_id=? ",[$request->user_id,$request->post_id]);
        }

        return response()->json([
           "like"=>$like,
        ]);
    }
}
