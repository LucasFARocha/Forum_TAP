@extends('layouts.header')

@section('style')
    <style>
        body {
            overflow-x: hidden;
        }
        .main {
            width: 100vw;
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            display: flex;
            background-color: rgb(65, 84, 189);
            border-radius: 18px;
            box-shadow: 1px 1px 8px 0 grey;
            height: fit-content ;
            padding: 20px 50px 20px 50px;
            width: fit-content;
            max-width: 900px;
            margin: auto;
            align-items: center;
        }
        .title{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 18pt;
            color: white;
            text-align: center;
            margin-bottom: 50px;
        }
        .table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14pt;
            color: white;
            border: none;
            height: max-content;
            width: max-content;
            display: flex;
            flex-direction: column;
        }
        .line {
            margin-bottom: 30px;
        }
        .edit, .delete{
            width: max-content;
            height: max-content;
            display: flex;
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #ffffffdd;
            text-decoration: none;
            border-radius: 5px;
            padding: 5px;
            margin-left: 15px;
            margin-top: 8px;
        }
        .buttons {
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .edit{
        }
        .delete{
            margin-top: 50px;
            margin-right: 9px;
            background-color: rgb(163, 7, 7);
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
            <div class="table">
                <p class="title">Informações do Tópico</p>
                <div class="content">
                    <div class="line">
                        <h4>Título: </h4>
                        <p>{{ $topic->title }}</p>
                    </div>
                    <div class="line">
                        <h4>Descrição: </h4>
                        <p>{{ $topic->description }}</p>
                    </div>
                </div>
            </div>
            @if(Auth::check())
                <div class="buttons">
                    <a href="" class="edit">Editar Tópico &nbsp;
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action=""> <!-- method="post" -->
                        @csrf
                        {{-- @method('delete') --}}
        
                        <button class="delete" type="submit">Excluir Tópico &nbsp;
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    @else
    <div>Tópico não encontrado!</div>

    @endif
@endsection