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
        // $usagiItems = Item::where('game_id', 1)->get();
        $usagiItems = Item::where(['game_id' => 1, 'created' => true])->get();;
        $usagiCreatedItems = CreatedItem::where('game_id', 1)->get();
        return view('game.usagi', compact(['gameUsagi', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu', 'usagiItems', 'usagiCreatedItems']));
    }

    public function kuma()
    {
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        $gameKuma = Game::where('id', 2)->first();
        // $kumaItems = Item::whereIn('game_id', [1, 2])->get();
        // $kumaItems = Item::where(['game_id' => 1])->get();
        $kumaItems = Item::where(['game_id' => 1, 'created' => true])->get();
        // $kumaCreatedItems = Item::where(['game_id' => 1, 'created' => true])->get();
        return view('game.kuma', compact(['gameKuma', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu', 'kumaItems']));
    }

    public function risu()
    {
        $gameIds = [1, 2];
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        $gameRisu = Game::where('id', 3)->first();
        // $risuItems = Item::where('game_id', 1)->get();
        $risuItems = Item::whereIn('game_id', ['1', '2'])->where(['created' => true])->get();
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
        Item::where('id', '=', 3)->update(['created' => 1]);
        return view('game.home', compact(['games', 'usagi', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu']));
    }

    public function completeUsagiGame(Game $game)
    {
        Game::where('id', '=', 1)->update(['completed' => 1]);
        Item::where('id', '=', 3)->update(['created' => 1]);

        return redirect('/home');
    }

    public function completeKumaGame(Game $game)
    {
        Game::where('id', '=', 2)->update(['completed' => 1]);

        return redirect('/home');
    }

    public function completeRisuGame(Game $game)
    {
        Game::where('id', '=', 3)->update(['completed' => 1]);

        return redirect('/home');
    }

    public function completeGame1()
    {
        $games = Game::all();
        $usagi = GameUsagi::all();
        $completedGameUsagi = Game::where('id', 1)->get();
        $completedGameKuma = Game::where('id', 2)->get();
        $completedGameRisu = Game::where('id', 3)->get();
        Game::where('id', '=', 2)->update(['completed' => 1]);
        return view('game.home', compact(['games', 'usagi', 'completedGameUsagi', 'completedGameKuma', 'completedGameRisu']));
    }

    public function createKumaItem1()
    {
        Item::where('id', '=', 4)->update(['created' => 1]);
        return back();
    }

     public function createKumaItem2()
    {
        Item::where('id', '=', 5)->update(['created' => 1]);
        return back();
    }

    public function createrisuitem1()
    {
        Item::where('id', '=', 7)->update(['created' => 1]);
        return back();
    }

    public function createrisuitem2()
    {
        Item::where('id', '=', 10)->update(['created' => 1]);
        return back();
    }

    public function createitem(CreatedItem $createditem)
    {
        request()->has('created') ? $createditem->create() : $createditem->notcreate();
        
        return back();
    }

    public function restartGame(Game $game)
    {
        Game::where('id', '=', 1)->update(['completed' => 0]);
        Game::where('id', '=', 2)->update(['completed' => 0]);
        Game::where('id', '=', 3)->update(['completed' => 0]);
        Item::where('id', '=', 3)->update(['created' => 0]);
        Item::where('id', '=', 4)->update(['created' => 0]);
        Item::where('id', '=', 5)->update(['created' => 0]);
        Item::where('id', '=', 7)->update(['created' => 0]);
        Item::where('id', '=', 10)->update(['created' => 0]);

        return redirect('/');
    }
}
