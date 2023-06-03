<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerManagement extends Model
{
    use HasFactory;
    protected $table = 'player_management';

    protected $fillable = [
        'name',
        'category',
        'pos',
        'opp',
        'fpts',
        'sal',
        
       
    ];
}
