<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spot extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'location',
        'bookie_name',
        'bookie_id',
        'max_cap',
        'spaces',
        
    ];
}
