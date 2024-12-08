@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/layouts/form.css')}}">
    <!-- Área de editar usuário -->
    <form action="{{ route('routeEditUser', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
        <h2 class="text black">Editar Usuário</h2>

        @csrf <!--tag em php para o token funcionar-->
        @method('put')

        <div class="form">
            <input type="name" id="name" name="name" placeholder="Nome de usuário"
                value="{{ old('name') }}">
            <!--Essa área só existe em caso de erro-->
            @error('name') <span>{{ $message }}</span> @enderror
    
            <input type="email" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
            @error('email') <span>{{ $message }}</span> @enderror
    
            <input type="password" id="password" name="password" placeholder="Senha">
            @error('password') <span>{{ $message }}</span> @enderror
            
            <input type="file" id="image" name="image">
            @error('password') <span>{{ $message }}</span> @enderror
    
            <input type="submit" value="Editar">
        </div>
    </form>
@endsection