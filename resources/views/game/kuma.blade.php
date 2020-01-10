@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@section('gameTitle')
    {{ $gameKuma->title }}
@endsection

@section('game')
    <div class="gameKuma gameAll">
        <div class="itemContent">
            <img class="kumaGame" src="img/biruKuma.png" alt="ビルとくま">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection