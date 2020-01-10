@section('gameHeader')
        <p class="returnBtn buttons">
            <a href="#">もどる</a>
        </p>

        {{-- ここにタイトル @yield を使うとページごとに違うタイトルの表示ができる --}}
        <h1 class="gameTitle">
            @yield('gameTitle')
        </h1>

        <p class="moveBtn buttons">
            <a href="#">すすむ</a>
        </p>
@endsection