<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterSkills extends Model
{
    use HasFactory;
    protected $table = 'character_skill';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;
}
