<div>
    <div class="container" style="margin-top: 100px !important;">
        @foreach($orders as $order)
            <div class="row flex-column mb-4 border rounded p-4">
                <h3>Client: <span class="text-primary">{{$order->user->first_name}}</span></h3>
                <h3 class="text-danger">Meals</h3>
                @foreach($order->items as $item)
                    <h5>{{$item->meal->name}} x{{$item->quantity}}</h5>
                @endforeach
                <h3>Notes</h3>
                <p>{{$order->notes}}</p>
                <button class="btn btn-primary mt-5 w-25">Start</button>
                <a href="http://localhost:8080/map/{{$order->lat}}/{{$order->lng}}">Show on The Map</a>
            </div>
        @endforeach
    </div>
</div>
