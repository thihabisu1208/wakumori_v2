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
        return view('game.home', compact(['games', 'usagi', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu']));
    }

    public function usagi()
    {
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        $gameUsagi = Game::where('id', 1)->first();
        $usagiItems = Item::where('game_id', 1)->get();
        $usagiCreatedItems = CreatedItem::where('game_id', 1)->get();
        return view('game.usagi', compact(['gameUsagi', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu', 'usagiItems', 'usagiCreatedItems']));
    }

    public function kuma()
    {
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        $gameKuma = Game::where('id', 2)->first();
        $kumaItems = Item::where(['game_id' => 1, 'game_id' => 2])->get();
        return view('game.kuma', compact(['gameKuma', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu', 'kumaItems']));
    }

    public function risu()
    {
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        $gameRisu = Game::where('id', 3)->first();
        $risuItems = Item::where('game_id', 3)->get();
        return view('game.risu', compact(['gameRisu', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu', 'risuItems']));
    }

    public function completeGame()
    {
        $games = Game::all();
        $usagi = GameUsagi::all();
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        Game::where('id', '=', 1)->update(['completed' => 1]);
        return view('game.home', compact(['games', 'usagi', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu']));
    }

    // public function completeTheGame(Request $request)
    // {
    //     request
    // }

    public function createitem(CreatedItem $createditem)
    {
        request()->has('created') ? $createditem->create() : $createditem->notcreate();
        
        return back();
    }
}
