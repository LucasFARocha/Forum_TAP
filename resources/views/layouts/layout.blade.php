<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum</title>
    <style>
        *{
            top: 0;
            right: 0;
        }
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #b1f2ff;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            display: block;
            color: #333;
        }

        .sidebar a:hover {
            color: #0000ff;
        }

        .header {
            margin-left: 250px;
            padding: 20px;
            background-color: #d8f9ff;
        }

        .content {
            margin-top: 20px;
            margin-left: 250px;
            padding: 20px;
            background-color: #d8f9ff;
        }
    </style>
<body>
    <div class="sidebar">
        <h2>Sidebar</h2>
        <a href="#">Home</a>
        <a href="#">Blog</a>
        <a href="#">Contato</a>
    </div>

    <div class="header">
        <h2>@yield('header')</h2>
        
        <p>Bem-vindo ao nosso site!</p>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
