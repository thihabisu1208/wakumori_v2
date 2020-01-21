@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameKuma->title }}
@endsection

@section('items')
    :items="{{ $kumaItems }}"
@endsection

@section('ifGame')
    @if ($completedGameKuma->first()->completed == 1)
    <a href="#">
            すすむ
    <i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
    </a>
    @endif
@endsection

@section('game')
    <div class="gameKuma gameAll">
        <sarubot-component :gamekuma="{{ $gameKuma }}"></sarubot-component>
        <div class="itemContent">
            <img class="kumaGame" src="/img/KingKong.png" alt="ビルとくま">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection