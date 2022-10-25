<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class WorkerSelected implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

   public $message, $worker_id;


   public function __construct($worker_id, $message)
    {
        $this->worker_id=$worker_id;
        $this->message=$message;
    }

    public function broadcastOn()
    {
        return ['worker-'.$this->worker_id];
    }

    public function broadcastAs()
    {
        return 'worker-selected';
    }
}
