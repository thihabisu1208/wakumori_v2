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
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        return view('game.home', compact(['games', 'usagi', 'completedGameUsagi', 'completedGameKuma','completedGameRisu']));
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
        $completedGameKuma = Game::where('id', 2)->get();
        return view('game.kuma', compact(['gameKuma', 'kumaItems', 'completedGameKuma']));
    }

    public function risu()
    {
        $gameRisu = Game::where('id', 3)->first();
        $risuItems = Item::where('game_id', 3)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        return view('game.risu', compact(['gameRisu', 'risuItems', 'completedGameRisu']));
    }

    public function createitem(CreatedItem $createditem)
    {
        request()->has('created') ? $createditem->create() : $createditem->notcreate();
        
        return back();
    }
}
