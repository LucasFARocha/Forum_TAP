@extends('layouts.header')
@section('style')
    <style>
        .tag-item{
            position: relative;
            max-width: 75%;
            margin: 2% 12% 2% 12%;
            border-radius: 5px;
            background-color: rgb(65, 84, 189);
            padding: 20px 25px 25px 25px;
        }
        .tag-content{
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
        .view-tag{
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
        .create-tag{
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
            margin-left: 30px;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
        }
        .view-tag:hover, .create-tag:hover{
            background-color: rgb(18, 64, 148);
        }
    </style>
@endsection
@section('content')
    @if(Auth::check())
        <a href="" class="create-tag">
            <i class="fa-solid fa-plus"></i>
            &nbsp; Criar Tag
        </a>
    @endif

    <div class="categories-container">
        @foreach($tags as $tag)

            <div class="tag-item">
                <div class="tag-content">

                    <div class="grid-container">
                        <div class="title">
                            <h2>{{ $tag->title }}</h2>
                        </div>
                        
                        <a href="{{route('routeListTagByID', $tag->id)}}" class="view-tag">
                            Visualizar &nbsp;
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
@endsection