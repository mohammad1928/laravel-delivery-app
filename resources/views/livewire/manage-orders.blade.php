<div>
    <div class="container mt-5">
        @foreach($orders as $order)
            <div :wire:key="{{$order->id}}" class="row justify-content-between p-2 p-sm-5 border rounded" style="margin-top: 100px">

                <div class="row flex-column">
                    <h1 class=""><i class="fa fa-user"></i> {{$order->user->first_name.' '.$order->user->last_name}}</h1>
                    <span><i class="fa fa-clock-o"></i> {{$order->created_at}}</span>
                </div>

                <div class="row flex-column">
                    <h1 class="">Status</h1>
                    <span>{{$order->order_status}}</span>
                </div>

                <button class="btn btn-primary" wire:click="setItems({{$order->items}},{{$order->id}},{{$order}})" data-toggle="modal" data-target="#exampleModal">Show Details</button>
            </div>
        @endforeach
            <!-- Modal -->
            <div wire:ignore.self class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           @if(isset($selected_order))
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Client Name: <span class="text-primary">{{json_decode(json_encode($selected_order))->user->first_name.' '.json_decode(json_encode($selected_order))->user->last_name}}</span></h3>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <h3 class="mb-3">Order Items</h3>
                                        @if(isset($orderItems))
                                            <table class="table table-hover">
                                                <thead>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                </thead>
                                                <tbody>
                                                @foreach(json_decode(json_encode($orderItems)) as $item)
                                                    <tr>
                                                        <td>{{$item->meal->name}}</td>
                                                        <td>{{$item->quantity}}</td>
                                                        <td>{{$item->meal->price}}</td>
                                                        <td>{{$item->quantity*$item->meal->price}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                    <div class="col-12 mt-4">
                                        <h3>Notes</h3>
                                        <p>{{json_decode(json_encode($selected_order))->notes}}</p>
                                    </div>
                                    <div class="col-12 mt-4">
                                        @if(!isset(json_decode(json_encode($selected_order))->worker_id))
                                            <form wire:submit.prevent="handleForm()">
                                                <h3 for="" class="text-dark">Select Delivery Worker</h3>
                                                <select wire:model="sworker" id="" class="form-control">
                                                    @foreach($workers as $worker)
                                                        <option value="{{$worker->id}}" wire:key="{{$worker->id}}" @if($order->worker_id==$worker->id) selected @endif>{{$worker->first_name}}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-primary mt-4">Confirm</button>
                                            </form>
                                        @else
                                            <h3>Worker: <span class="text-danger">{{json_decode(json_encode($selected_order))->worker->first_name.' '.json_decode(json_encode($selected_order))->worker->last_name}}</span> </h3>
                                        @endif
                                    </div>
                                </div>
                           @endif
                    </div>
                </div>
            </div>

    </div>
</div>
