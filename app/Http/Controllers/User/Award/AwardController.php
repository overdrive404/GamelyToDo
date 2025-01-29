<?php

namespace App\Http\Controllers\User\Award;

use App\Http\Requests\User\Award\StoreRequest;
use App\Models\Award;
use Illuminate\Support\Facades\DB;

class AwardController
{
    protected $character;

    public function __construct()
    {
        $this->character = auth()->user()->getCharacter;
    }

    public function index()
    {
        $awards = $this->character->getAwards;
        return view('awards.main', [
            'awards' => $awards,
            'character' => $this->character
        ]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['character_id'] = $this->character->id;
        Award::create($data);
        return redirect()->route('user.award.index');
    }

    public function destroy(Award $award) // Route Model Binding
    {
        $award->delete();
        return redirect()->route('user.award.index');
    }

    public function buy(Award $award)
    {
        DB::transaction(function () use ($award) {
            if ($this->character->decreaseGold($award->price)) {
                $award->delete();
            }
        });

        return redirect()->route('user.award.index');
    }
}
