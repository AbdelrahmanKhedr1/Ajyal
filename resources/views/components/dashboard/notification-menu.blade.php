<li class="dropdown d-none d-sm-block">
    <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
        <i class="icon-bell"></i>
        @if ($newCount)
        <span class="count-label"></span>
        @endif
    </a>
    <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
        <div class="dropdown-menu-header">
            Notifications ({{ $newCount }})
        </div>
        <ul class="header-notifications">
            @foreach ($notifications as $notification)
                <li>
                    <a href="{{$notification->data['url']}}?notification_id={{$notification->id}}">
                        <div class="user-img away">
                            <img src="img/user10.png" alt="Bootstrap Admin Panel">
                        </div>
                        <div class="details  @if ($notification->unread()) text-info @endif">
                            <div class="user-title">{{$notification->data['order_id']}}</div>
                            <div class="noti-details @if ($notification->unread()) text-info @endif">{{$notification->data['body']}}</div>
                            <div class="noti-date">{{$notification->created_at->diffForHumans()}}</div>
                        </div>
                    </a>
                </li>
            @endforeach


        </ul>
    </div>
</li>
