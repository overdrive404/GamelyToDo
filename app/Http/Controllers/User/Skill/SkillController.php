<?php

namespace App\Http\Controllers\User\Skill;

use App\Http\Requests\User\Skill\StoreRequest;
use App\Models\Character;
use App\Models\Skill;

class SkillController
{
    public function index(){
        $skills = Skill::all();
        return view('skills.main', compact('skills'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['character_id'] = 1;
        //dd($data);
        Skill::create($data);
        return redirect()->route('user.skill.index');

    }



}
