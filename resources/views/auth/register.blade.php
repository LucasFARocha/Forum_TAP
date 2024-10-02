@extends('layouts.header')

@section('style')
    <style>
        .text, .form{
            margin-top: 10px;
        }
        .text{
            text-align: center;
            font-size: 20pt;
        }
        input{
            width: 50%;
            margin-left: 24%;
            margin-bottom: 10px;
            font-size: 12pt;
        }
        input[type=name], [type=email], input[type=password] {
            padding: 12px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type=submit]{
            background-color: rgb(65, 84, 189);
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1b258d;
        }
    </style>
@endsection

@section('content')
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