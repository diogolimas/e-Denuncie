<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem_comment extends Model
{
    protected $fillable = [
        'nome', 'arquivo', 'descricao', 'comment_id'
    ];
}
