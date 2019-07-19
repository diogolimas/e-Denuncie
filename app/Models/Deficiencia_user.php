<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deficiencia_user extends Model
{
    protected $fillable = [
        'user_id', 'deficiencia_id'
    ];
}
