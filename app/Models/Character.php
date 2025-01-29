<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    public function addExperience($amount)
    {
        $this->experience += $amount;
        if ($this->experience > 100) {
            $this->level += 1;
            $this->experience -= 100;
        }
        $this->save();
    }

    protected function reduceLevel()
    {
        $this->level--;
        if ($this->level < 0) {
            $this->level = 0;
        }
    }

    public function addHealth($amount)
    {
        $this->health += $amount;

        if ($this->experience > 100) {
            $this->health = 100;
        }
        elseif ($this->health < 0) {
            $this->health = 50;
            $this->reduceLevel();
        }
        $this->save();
    }

    public function addGold($amount)
    {
        $this->gold += $amount;
        $this->save();
    }

    public function decreaseGold($amount)
    {
        if ($amount > $this->gold) {
            return null;
        }
        else{
            $this->gold -= $amount;
            $this->save();
            return $this;
        }
    }

    public function increaseStrength($amount){
        $this->strength_level += $amount;
        $this->save();
    }

    public function increaseIntelligence($amount){
        $this->intelligence_level += $amount;
        $this->save();
    }

    public function increaseCreativity($amount){
        $this->creativity_level += $amount;
        $this->save();
    }

    public function getSkills()
    {
       return $this->hasMany(Skill::class);
    }

    public function getAwards()
    {
        return $this->hasMany(Award::class);
    }

    public function getQuests()
    {
        return $this->hasMany(Quest::class);
    }

    public function getBosses(){
        return $this->hasMany(Boss::class);
    }


}
