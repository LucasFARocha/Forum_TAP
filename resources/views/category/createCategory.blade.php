@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/layouts/form.css')}}">
    <form action="{{ route('routeCreateCategory') }}" method="post">
        <h2 class="text black">Criar Categoria</h2>

        @csrf <!--tag em php para o token funcionar-->

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título da Categoria"
                value="{{ old('title') }}" required>
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror

            <input type="text" id="description" name="description" placeholder="Descrição da Categoria"
                value="{{ old('description') }}" required>
            @error('description') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Confirmar">
        </div>
    </form>
@endsection