<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterStats extends Model
{
    use HasFactory;
    protected $table = 'character_stats';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}