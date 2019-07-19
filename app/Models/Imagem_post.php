<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagem_post extends Model
{
    protected $fillable = [
        'nome', 'descricao_imagem', 'arquivo', 'post_id'
    ];

    public $rules = [
        'descricao_imagem' => 'required|max:1000',
    ];
}
