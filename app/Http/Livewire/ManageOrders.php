<?php

namespace App\Http\Livewire;

use App\Events\WorkerSelected;
use App\Models\Notification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageOrders extends Component
{
    protected $listeners=[
        "worker-selected"=>'$refresh',
    ];

    public $order_id, $orderItems, $sworker, $selected_order;
    public function render()
    {
        $orders=Order::with("items.meal","worker")->get();
        $workers=User::whereRoleIs("delivery-worker")->get();
        return view('livewire.manage-orders', compact("orders","workers"));
    }

    public function setItems($order_items, $order_id,$order){
        $this->orderItems=json_decode(json_encode($order_items));
        $this->order_id=$order_id;
        $this->selected_order=$order;
    }

    public function handleForm(){
        $order=Order::find($this->order_id);
        $order->worker_id=$this->sworker;
        $order->order_status="processing";
        if ($order->save()){
//            $this->dispatchBrowserEvent("worker-added");
            $notify=Notification::create([
                "user_id"=>$this->sworker,
                "order_id"=>$order->id,
                "title"=>"New Order",
                "body"=>"Hey, you have new order to deliver",
            ]);

            $notify2=Notification::create([
                "user_id"=>$order->user_id,
                "order_id"=>$order->id,
                "title"=>"Order Status",
                "body"=>"Hey, You order status updated",
            ]);

            event(new WorkerSelected($this->sworker,$notify));
            event(new WorkerSelected($this->selected_order["user_id"],["message"=>"Your order is processing"]));
        }


    }

}
