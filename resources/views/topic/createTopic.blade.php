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
        input, select{
            width: 50%;
            margin-left: 24%;
            margin-bottom: 10px;
            font-size: 12pt;
        }
        input[type=text], select{
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
    <form action="" method="post">
        <h2 class="text black">Criar Tópico</h2>

        @csrf <!--tag em php para o token funcionar-->
        @method('put')

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título do Tópico"
                value="{{ old('title') }}" required>
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror

            <input type="text" id="description" name="description" placeholder="Descrição do Tópico"
                value="{{ old('description') }}" required>
            @error('description') <span>{{ $message }}</span> @enderror

            <select name="category" id="category">
                <option value="none"></option>
                @foreach($categories as $category)
                    <option value="{{ $category->title }}">{{ $category->title }}</option>
                @endforeach
            </select>

            <input type="submit" value="Confirmar">
        </div>
    </form>
@endsection