<?php

namespace App\Http\Controllers\User\Quest;

use App\Models\Character;
use App\Models\Skill;
use Illuminate\Http\Request;
Use App\Models\Quest;
use App\Http\Requests\User\Quest\UpdateRequest;


class QuestController
{

    public function index(){
        $character = auth()->user()->getCharacter;
        $skills = $character->getSkills;
        $quests = $character->getQuests;
        return view('quests.main', compact('skills', 'quests', 'character'));
    }

    public function create()
    {
        $character = auth()->user()->getCharacter;
        $skills = $character->getSkills;
        return view('quests.create', compact('skills'));
    }

    public function edit(Quest $quest)
    {
        $character = auth()->user()->getCharacter;
        $skills = $character->getSkills;
        return view('quests.edit', compact('quest', 'skills'));
    }

    public function update(UpdateRequest $request, Quest $quest)
    {
        $data = $request->validated();
        $data['character_id'] = $quest->character->id;
        $quest->update($data);

        return redirect()->route('user.quest.index');
    }


    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'difficulty' => 'required|in:easy,normal,hard,extreme',
            'characteristic' => 'required|in:strength,intelligence,health,creativity',
            'skill_id' => 'nullable|exists:skills,id',
        ]);


        // Создаем новый квест
        Quest::create([
            'description' => $request->description,
            'difficulty' => $request->difficulty,
            'characteristic' => $request->characteristic,
            'skill_id' => $request->skill_id,
            'character_id' => auth()->user()->getCharacter->id,
        ]);

        return redirect()->route('user.quest.index');
    }

    public function destroy($id)
    {
        $quest = Quest::findOrFail($id);
        $quest->status = 'cancelled';
        $quest->save();
        $quest->delete();
        return redirect()->route('user.quest.index');
    }

    public function complete(Request $request, $questId)
    {
        $quest = Quest::findOrFail($questId);
        $character = $quest->character;
        $skill = $quest->skill;
        // Очки в зависимости от сложности квеста
        $xpSkill = 0;
        $xpCharacter = 0;
        $gold = 0;
        $characteristicIncrease = 0;

        switch ($quest->difficulty) {
            case 'easy':
                $xpSkill = 5;
                $xpCharacter = 5;
                $gold = 5;
                $characteristicIncrease = 1;
                break;
            case 'normal':
                $xpSkill = 10;
                $xpCharacter = 10;
                $gold = 10;
                $characteristicIncrease = 2;
                break;
            case 'hard':
                $xpSkill = 15;
                $xpCharacter = 15;
                $gold = 15;
                $characteristicIncrease = 3;
                break;
            case 'extreme':
                $xpSkill = 20;
                $xpCharacter = 20;
                $gold = 20;
                $characteristicIncrease = 4;
                break;
        }

        // Начисление опыта навыка
        if (isset($skill))
        {
        $skill->addExperience($xpSkill);
        }
        $character->addExperience($xpCharacter);
        $character->addGold($gold);

        switch ($quest->characteristic) {
            case 'strength':
                $character->increaseStrength($characteristicIncrease);
                break;
            case 'intelligence':
                $character->increaseIntelligence($characteristicIncrease);
                break;
            case 'creativity':
                $character->increaseCreativity($characteristicIncrease);
                break;
            case 'health':
                $character->addHealth($characteristicIncrease);
                break;
        }

        $quest->status = 'finished';
        $quest->save();
        $quest->delete();

        return redirect()->route('user.quest.index');

    }

}
