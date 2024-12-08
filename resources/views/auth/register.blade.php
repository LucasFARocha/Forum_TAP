@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/layouts/form.css')}}">
    <form action="{{ route('routeRegisterUser') }}" method="post">
        <h2 class="text black">Registrar-se</h2>
        @csrf <!--tag em php para o token funcionar-->

        <div class="form">
            <input type="name" id="name" name="name" placeholder="Nome de usuário"
                value="{{ old('name') }}" required>
            <!--Essa área só existe em caso de erro-->
            @error('name') <span>{{ $message }}</span> @enderror
    
            <input type="email" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
            
            
            <input type="password" id="password" name="password" placeholder="Senha" required>
            @error('password') <span>{{ $message }}</span> @enderror
    
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Senha" required>
    
            <input type="submit" value="Registrar">
        </div>
    </form>
@endsection