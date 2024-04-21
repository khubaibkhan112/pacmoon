<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestLike extends Model
{
    use HasFactory;
    protected $fillable = [
        'quest_id',
        'tweeter_id',
    ];
}
