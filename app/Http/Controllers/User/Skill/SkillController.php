<?php

namespace App\Http\Controllers\User\Skill;

use App\Http\Requests\User\Skill\StoreRequest;
use App\Models\Character;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController
{
    public function index(){
        $character = auth()->user()->getCharacter;
        $skills = $character->getSkills;
        return view('skills.main', compact('skills'));
    }


    public function store(StoreRequest $request)
    {
        $character = auth()->user()->getCharacter;
        $data = $request->validated();
        $data['character_id'] = $character->id;
        Skill::create($data);
        return redirect()->route('user.skill.index');
    }

    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();
        return redirect()->route('user.skill.index');
    }



}
