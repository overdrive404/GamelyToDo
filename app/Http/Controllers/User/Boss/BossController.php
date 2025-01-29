<?php

namespace App\Http\Controllers\User\Boss;

use Illuminate\Http\Request;
use App\Http\Requests\User\Boss\StoreRequest;
use App\Models\Boss;


class BossController
{
    public function index(){
        $character = auth()->user()->getCharacter;
        $bosses = $character->getBosses;
        return view('bosses.main', compact('bosses', 'character'));
    }


    public function store(StoreRequest $request)
    {
        $character = auth()->user()->getCharacter;
        $data = $request->validated();
        $data['character_id'] = $character->id;
        Boss::create($data);
        return redirect()->route('user.boss.index');
    }

    public function damage(Request $request, Boss $boss)
    {
        $character = auth()->user()->getCharacter;
        $character->addHealth(-10);
        $boss->increaseCount();
        return redirect()->route('user.boss.index');
    }

    public function destroy($id)
    {
        $boss = Boss::findOrFail($id);
        $boss->delete();
        return redirect()->route('user.boss.index');
    }



}
