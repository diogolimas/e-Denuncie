<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report_comment extends Model
{
    protected $fillable = [
        'descricao', 'user_id', 'instituicao_id', 'comment_id'
    ];
}
