@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/layouts/form.css')}}">
    <form action="{{ route('routeEditCategory', [$category->id])}}" method="post">
        <h2 class="text black">Editar Categoria</h2>

        @csrf <!--tag em php para o token funcionar-->
        @method('put')

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título da Categoria"
                value="{{ old('title') }}">
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror
    
            <input type="text" id="description" name="description" placeholder="Descrição da Categoria"
                value="{{ old('description') }}">
            @error('description') <span>{{ $message }}</span> @enderror
    
            <input type="submit" value="Editar">
        </div>
    </form>
@endsection