@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@extends('layouts.item')

@section('gameTitle')
    {{ $gameRisu->title }}
@endsection

@section('game')
    <div class="gameRisu gameAll">
        <div class="saruBot">
            <img src="/img/saru.png" alt="saruBot">
        </div>
        <div class="itemContent">
            <img class="risuGame" src="img/kumoRisu.png" alt="クモとリス">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection