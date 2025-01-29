<?php

namespace App\Http\Controllers\User\Award;

use App\Http\Requests\User\Award\StoreRequest;
use App\Models\Award;

class AwardController
{
    public function index(){
        $character = auth()->user()->getCharacter;
        $awards = $character->getAwards;
        return view('awards.main', compact('awards', 'character'));
    }


    public function store(StoreRequest $request)
    {
        $character = auth()->user()->getCharacter;
        $data = $request->validated();
        $data['character_id'] = $character->id;
        Award::create($data);
        return redirect()->route('user.award.index');
    }

    public function destroy($id)
    {
        $award = Award::findOrFail($id);
        $award->delete();
        return redirect()->route('user.award.index');
    }

    public function buy(Award $award)
    {
        $character = auth()->user()->getCharacter;

        $paid = $character->decreaseGold($award->price);
        if ($paid) {
            $award->delete();
        }
        return redirect()->route('user.award.index');
    }



}
