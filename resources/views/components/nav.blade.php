@foreach ($items as $item)
<li class="{{Route::is($item['active']) ? 'active' : ''}}">
    <a href="{{route($item['route']) }}">
        <i class="{{$item['icon']}}"></i>
        <span class="menu-text">{{$item['name']}}</span>
    </a>
</li>

@endforeach
