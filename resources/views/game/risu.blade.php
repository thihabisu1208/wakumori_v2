@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@section('gameTitle')
    {{ $gameRisu->title }}
@endsection

@section('game')
    <div class="gameRisu gameAll">
        <div class="itemContent">
            <img class="risuGame" src="img/kumoRisu.png" alt="クモとリス">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection