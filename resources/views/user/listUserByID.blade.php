@extends('layouts.header')

@section('style')
    <style>
        .main {
            margin-top: 6%;
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
            font-size: 18pt;
            color: white;
            text-align: center;
            margin-bottom: 50px;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14pt;
            color: white;
            border: none;
            height: fit-content;
            width: 80%;
        }
        .picture{
            max-width: 200px;
            max-height: 200px;
        }
        .edit, .delete{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: fit-content;
            height: fit-content;
            position: absolute;
            display: flex;
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #ffffffdd;
            text-decoration: none;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
        }
        .edit{
            margin-top: 17.8%;
            margin-left: 62%;
            background-color: #1b258d;
        }
        .delete{
            background-color: rgb(163, 7, 7);
            margin-top: 20.2%;
            margin-left: 61.4%;
            border-style: none;
        }
        .delete:hover{
            background-color: rgb(182, 4, 4);
        }
    </style>
@endsection

@section('content')
    @if($user != null)
        {{-- <table>
            <tr>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>{{ $user->email }}</td>
            </tr>
        </table> --}}
        <div class="main">
            <div class="card">
                <p class="title">Suas informações de usuário</p>
                <table>
                    <tbody>
                        <tr>
                            <td>Nome: </td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>
                                <img class="picture" src="/storage/{{ $user->photo }}" alt="Foto de Perfil">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{route('routeEditUser', [$user->id])}}" class="edit">Editar usuário &nbsp;
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                
                <form action="{{route('routeDeleteUser', [$user->id])}}" method="post">
                    @csrf <!--tag em php para o token funcionar-->
                    @method('delete')

                    <button class="delete" type="submit">Excluir Usuário &nbsp;
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                {{-- <span class="message">{{ session('message') }}</span> --}}
            </div>
        </div>

        {{-- <!-- Área de excluir usuário -->
        <form action="{{ route('routeDeleteUser', [$user->id]) }}" method="post">
            <h2>Excluir Usuário</h2>
            @csrf <!--tag em php para o token funcionar-->
            @method('delete')

            <input type="submit" value="Excluir">
        </form> --}}
    @else
        <div>Usuário não encontrado!</div>
        
    @endif
@endsection