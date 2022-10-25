<div>
    <div class="dropdown dropleft">
        <button class="btn btn-outline-primary dropdown-toggle" id="dropbtn" onclick="hideCounter()" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell"></i>
            @if(isset($notifications))
                @if(count($notifications)>0)
                    <span class="badge badge-danger" id="notify-counter">{{count($notifications)}}</span>
                @endif
            @endif
        </button>
        <div class="dropdown-menu" style="min-width: 400px" aria-labelledby="dropdownMenuButton">
            <button wire:click="removeAll" class="btn text-danger form-control"><i class="fa fa-trash text-danger"></i>Remove All Notifications ({{count($notifications)}})</button>
            <div id="notification-box" class="" style="max-height: 400px!important;overflow: auto">
                @foreach($notifications as $notify)
                    <a class='dropdown-item text-dark' href='#'>
                        <div class='d-flex flex-column'>
                            <h3>{{$notify->title}}+</h3>
                            <p>{{$notify->body}}</p>
                        </div>
                        <span class='dropdown-divider'></span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
