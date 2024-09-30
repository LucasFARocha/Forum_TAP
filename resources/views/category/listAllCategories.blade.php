@extends('layouts.header')
@section('style')
    <style>
        .category-item{
            position: relative;
            max-width: 75%;
            margin: 2% 12% 2% 12%;
            border-radius: 5px;
            background-color: rgb(65, 84, 189);
            padding: 20px 25px 25px 25px;
        }
        .category-content{
            color: #ffffffdd;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .grid-container{
            display: grid;
            grid-template-columns: auto 13%;
        }
        .description{
            margin-top: 2%;
            font-size: 12pt;
        }
        .view-category{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: 115px;
            height: fit-content;
            position: relative;
            display: flex;
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 5%;
            padding: 2px 10px 2px 10px;
        }
        .create-category{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: fit-content;
            height: fit-content;
            position: relative;
            display: flex;
            font-size: 14pt;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            margin-top: 5px;
            margin-left: 5px;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
        }
        .view-category:hover, .create-category:hover{
            background-color: rgb(18, 64, 148);
        }
    </style>
@endsection
@section('content')
    @if(Auth::check())
        <a href=" {{route('routeCreateCategory')}} " class="create-category">
            <i class="fa-solid fa-plus"></i>
            &nbsp; Criar Categoria
        </a>
    @endif

    <div class="categories-container">
        @foreach($categories as $category)

            <div class="category-item">
                <div class="category-content">

                    <div class="grid-container">
                        <div class="title">
                            <h2>{{ $category->title }}</h2>
                        </div>
                        
                        <a href="{{route('routeListCategoryByID', $category->id)}}" class="view-category">
                            Visualizar &nbsp;
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>

                    <div class="description">
                        <p>{{ $category->description }}</p>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
@endsection