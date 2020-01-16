@section('gameHeader')
        <p class="returnBtn buttons">
            <a href="{{ url('/home') }}">
            <i class="fas fa-arrow-left" style="padding-right: 10px;"></i>
            もどる
            </a>
        </p>

        {{-- ここにタイトル @yield を使うとページごとに違うタイトルの表示ができる --}}
        <h1 class="gameTitle">
            @yield('gameTitle')
        </h1>

        <p class="moveBtn buttons">
            @if ($completedGameUsagi->first()->completed == 1)
            <a href="#">
                    すすむ
            <i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
            </a>
            @endif
        </p>
@endsection