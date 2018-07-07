<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    //$id vai ser null quando o form for carregado sem ID (criação de post).
    public function form($id = null)
    {
        //Se achar, retorna post. Se não achar, retorna um new post (vazio)
        $post = Post::findOrNew($id);
        //Retorna uma view (em "resources/views") - Separa pastas por PONTO em vez de barras
        //O Array vai conter os dados de Post (se ele tiver)
        return view('admin.post.form', [
            'post' => $post,
        ]);
    }

    public function save(Request $request, $id = null)
    {
        //Se achar, retorna post. Se não achar, retorna um new post (vazio)
        $post = Post::findOrNew($id);

        //Preenche o post com os valores que estão vindo do Request
        $post->fill($request->input());

        //Cria post no banco de dados a partir de Model
        //Método save() do Eloquent: se chave primária existe, atualiza. Se não existe, cria.
        if ($post->save()){ //Retorna boolean TRUE se salvou
            //Se deu certo, vai pra página de listagem
            return redirect(url('/admin/posts'));
        } else {
            //back() - tela anterior que o usuário estava
            //withInput() - preenche tela com conteúdo que possuía
            return back()->withInput();

            //Adicionada no front-end: old()
            //withInput() retorna valores originais
            //old('chave', valorSeNaoTiverConteudoNaChave) retorna valor alterado
        }

    }

    public function list()
    {
        $posts = Post::all();
        //Dá um select no banco e retorna a view informada que acessa 
        return view('admin.post.list', [
            //"Crie uma variável interna em que cada um seja um post"
            'posts' => $posts,
        ]);
    }

    public function delete($id)
    {
        try {
            $post = Post::findOrFail($id);
        } catch (\Exception $e) {
            //with: guarda na seção do usuário atual do servidor uma mensagem com a chave informada (chave,mensagem)
            return back()->with('message', 'Post '.$id.' não encontrado para exclusão');
        }
        
        if ($post->delete()) {
            //poderia ser 'return back();' para retornar à tela anterior
            return redirect('/admin/posts');
        } else {
            return back()->with('message', 'Erro ao excluir o post '.$id);
        }
    }

}
