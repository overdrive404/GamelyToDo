<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['description', 'character_id', 'characteristic', 'skill_id', 'difficulty'];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function character(){
        return $this->belongsTo(Character::class);
    }
}
