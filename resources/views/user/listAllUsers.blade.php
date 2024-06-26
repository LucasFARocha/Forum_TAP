@extends('layouts.header')

@section('style')
    <style>
        .main {
            margin-left: 20%;
            padding: 0 10px;
            width: 58%;
        }
        .card {
            background-color: rgb(65, 84, 189);
            border-radius: 18px;
            box-shadow: 1px 1px 8px 0 grey;
            height: fit-content;
            margin-bottom: 20px;
            padding: 20px 50px 20px 50px;
        }
        .title{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20pt;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 30px;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14pt;
            color: white;
            border: none;
            height: fit-content;
            width: 80%;
        }
        .timeout, .ban{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            height: fit-content;
            position: relative;
            display: flex;
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #ffffffdd;
            text-decoration: none;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
        }
        .timeout{
            width: 186px;
            margin-bottom: 10px;
            margin-left: 75%;
            background-color: #b3410c;
        }
        .ban{
            width: 140px;
            background-color: rgb(163, 7, 7);
            margin-left: 93%;
            border-style: none;
        }
        .timeout:hover{
            background-color: #bd5220;
        }
        .ban:hover{
            background-color: rgb(182, 4, 4);
        }
    </style>
@endsection

@section('content')
    <p class="title">Usuários</p>

    @foreach($users as $user)
        <div class="main">
            <div class="card">
                <table>
                    <tbody>
                        <tr>
                            <td>Nome: </td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="" class="timeout">Suspender usuário &nbsp;
                                    <i class="fa-regular fa-clock"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="" class="ban">Banir usuário &nbsp;
                                    <i class="fa-solid fa-ban"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection