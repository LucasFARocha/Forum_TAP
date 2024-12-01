<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack Underflow</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">

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