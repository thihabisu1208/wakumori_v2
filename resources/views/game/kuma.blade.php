@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameKuma->title }}
@endsection

@section('game')
    <div class="gameKuma gameAll">
        <div class="saruBot">
            <img src="/img/saru.png" alt="saruBot">
        </div>
        <div class="itemContent">
            <img class="kumaGame" src="img/biruKuma.png" alt="ビルとくま">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection