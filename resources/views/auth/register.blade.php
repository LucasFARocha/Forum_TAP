<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrar-se</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<form action="{{ route('routeRegisterUser') }}" method="post">
    <h2>Registrar-se</h2>
    @csrf <!--tag em php para o token funcionar-->

    <input type="text" id="name" name="name" placeholder="Nome de usuário"
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
</form>

</body>
</html>