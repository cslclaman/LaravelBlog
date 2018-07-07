<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //Em vez de excluir, apenas atualiza coluna 'deleted_at'
    use SoftDeletes;

    protected $table = 'post';
    //Fillable: quais campos são preenchidos em uma requisição
    protected $fillable = [
        'titulo',
        'conteudo'
    ];
}
