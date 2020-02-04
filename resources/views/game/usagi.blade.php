@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameUsagi->title }}
@endsection

@section('items')
    <game-component :usagiitems="{{ $usagiItems }}"></game-component>
@endsection

@section('createditems')
    <selected-items-component :usagicreateditems="{{ $usagiCreatedItems }}"></selected-items-component>
@endsection

@section('createdItems')
    <created-items-component :nowgame="{{ $completedGameUsagi }}" :usagicreateditems="{{ $usagiCreatedItems }}"></created-items-component>
@endsection

@section('forward')
    <forward-component :completedgameusagi="{{ $gameUsagi }}"></forward-component>
@endsection

@section('ifGame')
    @if ($completedGameUsagi->first()->completed == 0)
    <a href="/completeGame">
            すすむ
    <i class="fas fa-arrow-right" style="padding-left: 10px;"></i>
    </a>
    @endif
@endsection

@section('game')
    <div class="gameUsagi gameAll">
        <sarubot-component :gameusagi="{{ $gameUsagi }}"></sarubot-component>
        <div class="hashigoTop">
            <img src="/img/item/hashigo_wood.png" />
        </div>
        <div class="saru">
            <img src="/img/saru.png" />
        </div>
        <div class="itemContent">
            <img class="usagiGame" src="/img/yasiUsagi.png" alt="ヤシとウサギ">
        </div>
    </div>
@endsection