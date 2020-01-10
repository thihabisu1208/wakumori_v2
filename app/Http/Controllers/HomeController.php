<?php

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Item;
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
        $items = Item::where('game_id', 1)->get();
        return view('game.usagi', compact(['gameUsagi', 'items']));
    }

    public function kuma()
    {
        $gameKuma = Game::where('id', 2)->first();
        return view('game.kuma', compact(['gameKuma']));
    }

    public function risu()
    {
        $gameRisu = Game::where('id', 3)->first();
        return view('game.risu', compact(['gameRisu']));
    }
}
