<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack Underflow</title>
    <style>
        *{
            right: 0;
            margin: 0;
        }
        nav{
            background-color: rgb(65, 84, 189);
            width: 100%;
            height: 70px;
        }
        .login, .register, .welcome, .logout{
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #ffffffdd;
            text-decoration: none;
            background-color: #1b258d;
            border-radius: 5px;
            margin-right: 10px;
            padding: 2px 10px 2px 10px;
            margin-top: 22px;
        }
        .login{
            right: 100px;
            margin-right: 60px;
        }
        .welcome{
            right: 100px;
            margin-right: 70%;
        }
        .register, .logout{
            right: 0;
            margin-right: 30px;
        }
    </style>
    @yield('style')
</head>
<body>
    @if(Auth::guest())
        <nav class="header">
            <a class="login" href="{{route('routeLoginUser')}}">Entrar</a>
            <a class="register" href="{{route('routeRegisterUser')}}">Registrar-se</a>
        </nav>
    @endif

    @if(Auth::check())
        <nav class="header">
            <p class="welcome">Bem vindo ao Stack Underflow!</p>
            <a href="{{route('routeLogoutUser')}}" class="logout">Sair</a>
        </nav>
    @endif
    
    @yield('content')
</body>
</html>