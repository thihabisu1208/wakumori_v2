@section('order')
    <div class="makeItem">
        <p class="orderTitle">作ったもの</p>
    </div>
    <created-items-component :nowgame="{{ $completedGameUsagi }}" @yield('createdItems')></created-items-component>
@endsection