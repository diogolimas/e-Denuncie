<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem_post extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'arquivo', 'post_id'
    ];
}
