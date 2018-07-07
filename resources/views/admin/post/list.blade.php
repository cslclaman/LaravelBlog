@extends('layout.admin')

@section('content')
<table>
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Conteúdo</th>
        <th>Ações</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->titulo }}</td>
        <td>{{ $post->conteudo }}</td>
        <td><a href="{{url('/admin/post/' . $post->id)}}"><button>Editar</button></a></td>
        <td><button onclick="confirmaDelete('{{url('/admin/post/' . $post->id . '/delete')}}')">Remover</button></td>
    </tr>
    @endforeach
</table>

<script>
function confirmaDelete(url) {
    if ( confirm('Deseja remover esse post?') ){
        location.href = url;
    }
}
</script>

@endsection