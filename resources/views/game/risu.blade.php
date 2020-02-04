@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameRisu->title }}
@endsection

@section('items')
    <game-component :risuitems="{{ $risuItems }}"></game-component>
@endsection

@section('createditems')
    <selected-items-component :risucreateditems="{{ $risuItems }}"></selected-items-component>
@endsection

@section('createdItems')
    <created-items-component :nowgame="{{ $completedGameRisu }}" :risucreateditems="{{ $risuItems }}"></created-items-component>
@endsection

@section('forward')
    <forward-component :completedgamerisu="{{ $gameRisu }}"></forward-component>
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
        <div class="hashigoTop">
            <img src="/img/item/hashigo_wood.png" />
        </div>
        <div class="elevatorClose goDown">
            <img src="/img/item/elevator_door_close.png" />
        </div>
        <div class="elevatorOpen goDown">
            <img src="/img/item/elevator_door_open.png" />
        </div>
        <div class="saru goDown fly">
            <img src="/img/saru.png" />
        </div>
        <div class="itemContent">
            <img class="risuGame" src="/img/anchira.png" alt="クモとリス">
        </div>
        <div class="cushion">
            <img src="/img/item/kagu_cushion.png" />
        </div>
        <div class="kikyuu fly">
            <img src="/img/item/kikyuu.png" />
        </div>
        <div class="koukyuu fly">
            <img src="/img/item/airplane_ornithopter.png" />
        </div>
        <div class="otya">
            <img src="/img/item/drink_chabashira.png" alt="otya">
            <img class="favorite" src="/img/item/heart_small.png" alt="favorite">
        </div>
    </div>
@endsection