<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function userNotifications($id)
    {
        $notifications=Notification::where("user_id",$id)->get();
        return response()->json([
            "notifications"=>$notifications,
        ]);
    }
}
