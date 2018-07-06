<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function form()
    {
        //Retorna uma view (em "resources/views") - Separa pastas por PONTO em vez de barras
        return view('admin.post.form');
    }

    public function save(Request $request)
    {
        //Cria
        $post = Post::create($request->input());
        dd($post);
    }

}
