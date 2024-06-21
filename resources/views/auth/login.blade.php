@extends('layouts.login_register')

@section('content')
    <form action="{{ route('routeLoginUser') }}" method="post">
        <h2 class="text">Entre com sua conta de usuário</h2>
        @csrf

        <div class="form">
            <input type="email" id="email" name="email" placeholder='Email'
                value="{{ old('email') }}" required>
            @error('email') <span class="error">{{ $message }}</span> @enderror
        
            <input type="password" id="password" name="password" placeholder='Senha' required>
            @error('password') <span class="error">{{ $message }}</span> @enderror
        
            <input type="submit" value="Entrar">
        </div>
    </form>
@endsection
