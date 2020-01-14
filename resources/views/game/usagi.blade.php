@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameUsagi->title }}
@endsection

@section('items')
    :items="{{ $items }}"
@endsection

@section('game')
    <div class="gameUsagi gameAll">
        <div class="saruBot">
            <img src="/img/saru.png" alt="saruBot">
        </div>
        <div class="itemContent">
            <img class="usagiGame" src="/img/yasiUsagi.png" alt="ヤシとウサギ">
        </div>
    </div>
@endsection