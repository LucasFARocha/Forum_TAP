@extends('layouts.header')

@section
banana
    {{-- <form action="{{route('routeCreateComment', $topic->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form">

            <textarea id="content" name="content" placeholder="Comente algo bacana"
                value="{{ old('content') }}" required></textarea>
            @error('content') <span>{{ $message }}</span> @enderror

            <input type="file" id="image" name="image" placeholder="Imagem do Comentário" 
            value="{{ old('image') }}">
            @error('image') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Comentar">
    </form> --}}
@endsection