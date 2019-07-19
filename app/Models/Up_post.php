<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Up_post extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'instituicao_id', 'ups'
    ];
}
