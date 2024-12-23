@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <form action="{{ route('routeCreateTopic') }}" method="post" enctype="multipart/form-data">
        <h2 class="text black">Criar Tópico</h2>
        
        @csrf

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título do Tópico"
                value="{{ old('title') }}" required>
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror

            <textarea type="text" id="description" name="description" placeholder="Descrição do Tópico"
                value="{{ old('description') }}" required></textarea>
            @error('description') <span>{{ $message }}</span> @enderror
            
            <input type="file" id="image" name="image" placeholder="Imagem do Tópico"
            value="{{ old('image') }}">
            @error('image') <span>{{ $message }}</span> @enderror
            
            <select name="category" id="category">
                <option value="">Selecione uma categoria</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category') <span>{{ $message }}</span> @enderror

            <select name="tags[]" id="tags" size="3" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            @error('tag') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Confirmar">
        </div>
    </form>
@endsection