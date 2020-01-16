<?php

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Item;
use App\CreatedItem;
use App\GameUsagi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $usagi = GameUsagi::all();
        return view('game.home', compact(['games', 'usagi']));
    }

    public function usagi()
    {
        $gameUsagi = Game::where('id', 1)->first();
        $completedGameUsagi = Game::where('id', 1)->get();
        $usagiItems = Item::where('game_id', 1)->get();
        $usagiCreatedItems = CreatedItem::where('game_id', 1)->get();
        return view('game.usagi', compact(['gameUsagi', 'completedGameUsagi', 'usagiItems', 'usagiCreatedItems']));
    }

    public function kuma()
    {
        $gameKuma = Game::where('id', 2)->first();
        $kumaItems = Item::where('game_id', 2)->get();
        return view('game.kuma', compact(['gameKuma', 'kumaItems']));
    }

    public function risu()
    {
        $gameRisu = Game::where('id', 3)->first();
        $risuItems = Item::where('game_id', 3)->get();
        return view('game.risu', compact(['gameRisu', 'risuItems']));
    }
}
