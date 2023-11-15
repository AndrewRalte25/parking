<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkhistory extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'user_name',
        'user_id',
        'spot_name',
        'location',
        'bookie_id',
        'registration',
        
        
    ];
}
