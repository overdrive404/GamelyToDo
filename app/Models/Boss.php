<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boss extends Model
{
    use HasFactory;

    protected $table = 'bosses';

    protected $fillable = ['name', 'character_id', 'count'];

    public function increaseCount()
    {
        $this->count++;
        return $this->save();
    }


}
