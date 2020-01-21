@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameRisu->title }}
@endsection

@section('ifGame')
    @if ($completedGameRisu->first()->completed == 1)
    <a href="#">
            すすむ
    <i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
    </a>
    @endif
@endsection

@section('game')
    <div class="gameRisu gameAll">
        <sarubot-component :gamerisu="{{ $gameRisu }}"></sarubot-component>
        <div class="itemContent">
            <img class="risuGame" src="/img/anchira.png" alt="クモとリス">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection