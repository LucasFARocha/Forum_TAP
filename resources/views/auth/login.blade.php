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
        input[type=email], input[type=password] {
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
    <form action="{{ route('routeLoginUser') }}" method="post">
        <h2 class="text black">Entre com sua conta de usuário</h2>
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
