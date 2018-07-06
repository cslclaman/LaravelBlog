<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    //Fillable: quais campos são preenchidos em uma requisição
    protected $fillable = [
        'titulo',
        'conteudo'
    ];
}
