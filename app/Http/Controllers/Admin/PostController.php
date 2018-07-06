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
        //Cria post no banco de dados a partir de Model
        $post = Post::create($request->input());
        return redirect(url('/admin/posts'));
    }

    public function list()
    {
        return view('admin.post.list');
    }

}
