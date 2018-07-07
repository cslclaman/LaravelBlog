@extends('layout.admin')

@section('content')
<table class='table'>
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
        <td><a href="{{url('/admin/post/' . $post->id)}}"><button class='btn btn-primary'>Editar</button></a>
        <button class='btn btn-danger' onclick="confirmaDelete('{{url('/admin/post/' . $post->id . '/delete')}}')">Remover</button></td>
    </tr>
    @endforeach
</table>

<a href="{{ url('/admin/post/') }}"><button class='btn'>Criar novo post</button></a>

<script>
function confirmaDelete(url) {
    if ( confirm('Deseja remover esse post?') ){
        location.href = url;
    }
}
</script>

@endsection