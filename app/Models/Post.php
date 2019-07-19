<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public $timestamps = true;

    protected $fillable = [
        'descricao', 'user_id','imagem'
    ];

    public $rules = [
        'descricao' => 'required|max:1000',
    ];
}
