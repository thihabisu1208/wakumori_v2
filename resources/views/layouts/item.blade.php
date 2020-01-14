@section('item')
    <div class="selectItem">
        <selected-items-component></selected-items-component>
    </div>
    <div>
        <game-component @yield('items')></game-component>
    </div>
@endsection