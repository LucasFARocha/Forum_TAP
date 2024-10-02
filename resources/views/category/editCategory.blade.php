@extends('layouts.header')

@section('style')
    <style>
        .text, .form{
            margin-top: 10px;
        }
        .text{
            text-align: center;
            font-size: 20pt;
        }
        input{
            width: 50%;
            margin-left: 24%;
            margin-bottom: 10px;
            font-size: 12pt;
        }
        input[type=text]{
            padding: 12px 20px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type=submit]{
            background-color: rgb(65, 84, 189);
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #1b258d;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('routeEditCategory', [$category->id])}}" method="post">
        <h2 class="text black">Editar Categoria</h2>

        @csrf <!--tag em php para o token funcionar-->
        @method('put')

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título da Categoria"
                value="{{ old('title') }}">
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror
    
            <input type="text" id="description" name="description" placeholder="Descrição da Categoria"
                value="{{ old('description') }}">
            @error('description') <span>{{ $message }}</span> 
            @enderror
    
            <input type="submit" value="Editar">
        </div>
    </form>
@endsection