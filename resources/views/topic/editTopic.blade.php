@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <form action="{{ route('routeEditTopic', $topic->id) }}" method="post" enctype="multipart/form-data">
        <h2 class="text black">Editar Tópico</h2>
        
        @csrf

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título do Tópico"
                value="{{ old('title', $topic->title) }}" required>
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror

            <textarea type="text" id="description" name="description" placeholder="Descrição do Tópico"
                value="{{ old('description') }}" required>{{$topic->description}}</textarea>
            @error('description') <span>{{ $message }}</span> @enderror
            
            <input type="file" id="image" name="image" placeholder="Imagem do Tópico"
            value="{{ old('image') }}">
            @error('image') <span>{{ $message }}</span> @enderror
            
            <select name="category" id="category">
                <!-- <option value="none"></option> -->

                {{-- Pequena gambiarra para garantir que a categoria atual seja a primeira
                a aparecer --}}
                @foreach($categories as $category)
                    @if($category->id == $topic->category_id)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                @endforeach

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
            @error('tags') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Confirmar">
        </div>
    </form>
@endsection