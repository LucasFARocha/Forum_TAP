<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack Underflow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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
        .home, .login, .register, .welcome, .logout, .profile{
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
        .home{
            left: 0;
            margin-left: 30px;
            width: fit-content;
        }
        .login{
            right: 100px;
            margin-right: 85px;
        }
        .welcome{
            left: 0;
            margin-left: 135px;
            width: fit-content;
        }
        .register, .logout{
            right: 0;
            margin-right: 30px;
        }
        .profile{
            right: 50px;
            margin-right: 68px;
        }
        a:hover{
            background: rgb(18, 64, 148);
        }
    </style>
    @yield('style')
</head>
<body>
    
    <nav class="header">
        <a href="{{route('routeHome')}}" class="home"><i class="fa-solid fa-house"></i>&nbsp; Início</a>

        @if(Auth::guest())
            <a class="login" href="{{route('routeLoginUser')}}">Entrar &nbsp;
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            <a class="register" href="{{route('routeRegisterUser')}}">Registrar-se &nbsp;
                <i class="fa-solid fa-plus"></i>
            </a>
        @endif
        
        @if(Auth::check())
            
            <p class="welcome">Bem vindo, {{ Auth::user()->name }}!</p>

            <a href="{{route('routeListUserByID', [Auth::user()->id])}}" class="profile">Perfil &nbsp;
                <i class="fa-solid fa-user"></i>
            </a>

            <a href="{{route('routeLogoutUser')}}" class="logout">Sair &nbsp;
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        @endif
        
    </nav>
    @yield('content')
</body>
</html>