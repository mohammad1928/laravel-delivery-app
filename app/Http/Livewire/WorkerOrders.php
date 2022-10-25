<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkerOrders extends Component
{
    public function render()
    {
        $orders=Order::where("worker_id",Auth::id())->with("user","items.meal")->get();
        return view('livewire.worker-orders',compact("orders"));
    }
}
