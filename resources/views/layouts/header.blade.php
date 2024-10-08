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
        a, .welcome{
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #ffffffdd;
            text-decoration: none;
            background-color: #1b258d;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
            justify-content: center;
            align-items: center;
            position: absolute;
            display: flex;
            margin-right: 10px;
            margin-top: 22px;
        }
        /* .home, .login, .register, .welcome, .logout, .profile,
        .create-topic, .view-categories,
        .view-category, .create-category,
        .view-tags, .view-tag, .create-tag{
            
        } */
        .create-category, .create-tag{
            margin-left: 30px;
        }
        .home{
            left: 0;
            margin-left: 30px;
            width: fit-content;
        }
        .login{
            right: 100px;
            margin-right: 90px;
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
        .text{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: #ffffffdd;
        }
        .black{
            color: black;
        }
    </style>
    @yield('style')
</head>
<body>
    
    <nav class="header">
        <a href="{{route('routeHome')}}" class="home">
            <i class="fa-solid fa-house"></i>
            &nbsp; Início
        </a>

        @if(Auth::guest())
            <a class="login" href="{{route('routeLoginUser')}}">Entrar &nbsp;
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            <a class="register" href="{{route('routeRegisterUser')}}">Registrar-se &nbsp;
                <i class="fa-solid fa-user-plus"></i>
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