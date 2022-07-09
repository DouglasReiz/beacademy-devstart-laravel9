@extends('template.users')
@section('title', "listagem de postagem do { $user->name } ")
@section('body')
<h1>Postagens do {{ $user->name }}</h1>

@foreach($posts as $post)
<div class="mb-3">
    <label for="" class="form-label">Identificação Nº:<br><b> {{ $post->id }} </b></label>
        <br>
    <label for="" class="form-label">Status:<br> <b>  {{ $post->active?'Ativo':'Inativo' }}</b> </label>
        <br>
    <label for="" class="form-label">Título:<br> <b> {{ $post->title }}</b></label>
        <br>
    <label for="" class="form-label">Postagem:<br></label>
        <br>
    <textarea for="" class="form-control" rows="3">{{ $post->post }}</textarea>
        <br>
</div>
@endforeach

@endsection