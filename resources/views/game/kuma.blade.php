@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameKuma->title }}
@endsection

@section('items')
    <game-component :kumaitems="{{ $kumaItems }}"></game-component>
@endsection

@section('createditems')
    <selected-items-component :kumacreateditems="{{ $kumaItems }}"></selected-items-component>
@endsection

@section('createdItems')
    <created-items-component :nowgame="{{ $completedGameKuma }}" :kumacreateditems="{{ $kumaItems }}"></created-items-component>
@endsection

@section('forward')
    <forward-component :completedgamekuma="{{ $gameKuma }}"></forward-component>
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
        <sarubot-component :kumacreateditems="{{ $kumaItems }}" :gamekuma="{{ $gameKuma }}"></sarubot-component>
        <div class="hashigoTop">
            <img src="/img/item/hashigo_wood.png" />
        </div>
        <div class="elevatorClose goUp">
            <img src="/img/item/elevator_door_close.png" />
        </div>
        <div class="elevatorOpen goUp">
            <img src="/img/item/elevator_door_open.png" />
        </div>
        <div class="saru goUp">
            <img src="/img/saru.png" />
        </div>
        <div class="itemContent">
            <img class="kumaGame" src="/img/kuma_biru.png" alt="ビルとくま">
            <img class="kumaGame" id="kuma" src="/img/kuma_noboru.png" alt="ビルとくま">
        </div>
        <div class="cushion">
            <img src="/img/item/kagu_cushion.png" />
        </div>
    </div>
@endsection