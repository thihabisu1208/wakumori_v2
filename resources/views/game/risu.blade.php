@extends('layouts.game')

@extends('layouts.gameHeader')

@extends('layouts.order')

@section('gameTitle')
    {{ $gameRisu->title }}
@endsection

@section('game')
    <div class="gameUsagi">
        <div class="itemContent">
            <img class="usagiGame" src="img/yasiUsagi.png" alt="ヤシとウサギ">
            <div class="itemList">

            </div>
        </div>
    </div>
@endsection