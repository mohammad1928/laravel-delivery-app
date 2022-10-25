<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NotifcationsComponent extends Component
{
    public function render()
    {
        $notifications=Notification::where("user_id",Auth::id())->get();
        return view('livewire.notifcations-component',compact("notifications"));
    }

    public function mount(){
        $this->notifications=\App\Models\Notification::where("user_id",auth()->id())->get();
    }

    public function removeAll(){
        $result=DB::delete("Delete from notifications WHERE user_id=?",[Auth::id()]);
        if ($result)
            return redirect()->back()->with(["message"=>"notifications removed successfully"]);
    }
}
