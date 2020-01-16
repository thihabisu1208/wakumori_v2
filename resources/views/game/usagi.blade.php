@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameUsagi->title }}
@endsection

@section('items')
    :items="{{ $usagiItems }}"
@endsection

@section('createdItems')
    :createdItems="{{ $usagiCreatedItems }}"
@endsection

@section('game')
    <div class="gameUsagi gameAll">
        <sarubot-component></sarubot-component>
        <div class="itemContent">
            <img class="usagiGame" src="/img/yasiUsagi.png" alt="ヤシとウサギ">
        </div>
    </div>
@endsection