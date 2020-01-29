@extends('layouts.app')

@section('content')
    <div class="content" id="contentGame">
        <hello-saru-component  :usagicompleted="{{ $completedGameUsagi }}"></hello-saru-component>
        <div class="contentGame">
            <h2>ゲーム画面<h2>
            <hr>
            <div id="contentGames">
            @foreach ($games as $game)
                <content-game-component :gamepath="'{{ $game->path }}'" :completedgameusagi="{{ $completedGameUsagi }}" :completedgamekuma="{{ $completedGameKuma }}" :completedgamerisu="{{ $completedGameRisu }}" :gameid="'{{ $game->id }}'" :gametitle="'{{ $game->title }}'" :gamedescription="'{{ $game->description }}'" ></content-game-component>
                {{-- <div class="contentGamesContent">
                    <div class="contentGame contentGame1">
                        <div class="contentGameContent">
                            <img src="/img/teacher/{{ $game->id }}.png" />
                            <h3>{{ $game->title }}</h3>
                        </div>
                    </div>
                    <div class="contentGame contentGame2">
                        <div class="contentGameContent">
                            <p>{{ $game->description }}。</p>
                            <p class="buttons">
                                <a href="{{ $game->path }}">やってみる</a>
                            </p>
                        </div>
                    </div>
                </div> --}}
            @endforeach
            </div>
        </div>
    </div>
@endsection