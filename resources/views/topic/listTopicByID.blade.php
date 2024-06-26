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
        .topic-description{
            margin-top: 100px;
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
            margin: 20% 10px 0 65%;
            padding: 2px 10px 2px 10px;
        }
        .edit{
            margin-top: 17%;
            background-color: #1b258d;
        }
        .delete{
            background-color: rgb(163, 7, 7);
            margin-left: 64.5%;
            border-style: none;
        }
        .delete:hover{
            background-color: rgb(182, 4, 4);
        }
    </style>
@endsection

@section('content')
    @if($topic != null)

    <div class="main">
        <div class="card">
            <p class="title">Informações do Tópico</p>
            <table>
                <tbody>
                    <tr class="topic-title">
                        <td>Título: </td>
                        <td>{{ $topic->title }}</td>
                    </tr>
                    <tr class="topic-description">
                        <td>Descrição: </td>
                        <td>{{ $topic->description }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="" class="edit">Editar Tópico &nbsp;
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            
            <form action="" method="post">
                @csrf <!--tag em php para o token funcionar-->
                {{-- @method('delete') --}}

                <button class="delete" type="submit">Excluir Tópico &nbsp;
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
            {{-- <span class="message">{{ session('message') }}</span> --}}
        </div>
    </div>

    @else
    <div>Tópico não encontrado!</div>

    @endif
@endsection