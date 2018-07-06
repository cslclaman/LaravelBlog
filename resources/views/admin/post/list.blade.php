@extends('layout.admin')

@section('content')
<table>
    <tr>
        <th>ID</th><th>Título</th><th>Conteúdo</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->titulo }}</td>
        <td>{{ $post->conteudo }}</td>
    </tr>
    @endforeach
</table>
@endsection