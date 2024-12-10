@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment/comment.css') }}">
    <form action="{{route('routeEditComment', $comment->id)}}" method="post" enctype="multipart/form-data">
        <h2 class="text black">Editar Comentário</h2>
        @csrf
        <div class="form">
            <textarea id="content" name="content" placeholder="Comente algo bacana"
                value="{{ old('content') }}" required>{{$comment->content}}</textarea>
            @error('content') <span>{{ $message }}</span> @enderror

            <input type="file" id="image" name="image" placeholder="Imagem do Comentário" 
            value="{{ old('image') }}">
            @error('image') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Comentar">
    </form>
@endsection