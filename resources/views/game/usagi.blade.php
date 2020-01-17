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

@section('ifCompleted')
    @if ($completedGameUsagi->first()->completed == 1)
    <a href="#">
            すすむ
    <i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
    </a>
    @endif
@endsection

@section('game')
    <div class="gameUsagi gameAll">
        <sarubot-component></sarubot-component>
        <div class="itemContent">
            <img class="usagiGame" src="/img/yasiUsagi.png" alt="ヤシとウサギ">
        </div>
    </div>
@endsection