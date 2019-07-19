<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report_post extends Model
{
    protected $fillable = [
        'descricao', 'post_id', 'user_id', 'instituicao_id'
    ];
}
