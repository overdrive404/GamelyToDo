<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'character_id'];

    public function addExperience($amount)
    {
        $this->experience += $amount;
        if ($this->experience > 100) {
            $this->level += 1;
            $this->experience -= 100;
        }
        $this->save();
    }

}
