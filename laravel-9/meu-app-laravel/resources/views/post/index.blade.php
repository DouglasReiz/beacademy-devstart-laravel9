@extends('template.users')
@section('title','Listagem de postagens')
@section('body')
        <h1>Listagem de postagens</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Novo Usuário</a>



        <table class="table table-dark table-hover">
            <thead class="text-center">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuário</th>
                <th scope="col">Titulo</th>
                <th scope="col">Postagem</th>
                <th scope="col">Data Cadastro</th>
<!--                 <th scope="col">Ações</th> -->
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($posts as $post)
                <tr>
                   
                    <th scope="row"> {{ $post->id }} </th>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->post }}</td>
                    <td>{{ $post->created_at }}</td>
                    
                    
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection