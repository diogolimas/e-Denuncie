<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like_comment extends Model
{
    protected $fillable = [
        'user_id', 'comment_id'
    ];
}
