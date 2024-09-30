@extends('layouts.header')

@section('style')
    <style>
        .topic-item{
            position: relative;
            max-width: 75%;
            margin: 2% 12% 2% 12%;
            border-radius: 5px;
            background-color: rgb(204, 220, 235);
            padding: 5px 10px 5px 10px;
        }
        .topic-content{
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
        .view-topic{
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
            background-color: rgb(71, 99, 125);
            color: #ffffffdd;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 5%;
            padding: 2px 10px 2px 10px;
        }
        .view-topic:hover{
            background-color: rgb(82, 112, 140);
        }
        .create-topic{
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
            color: #ffffffdd;
            text-decoration: none;
            margin-top: 5px;
            margin-left: 5px;
            border-radius: 5px;
            padding: 2px 10px 2px 10px;
        }
    </style>
@endsection

@section('content')
    @if(Auth::check())
        <a href="" class="create-topic">
            <i class="fa-solid fa-plus"></i>
            &nbsp; Criar Tópico
        </a>
    @endif

    <div class="topics-container">
        @foreach($topics as $topic)

            <div class="topic-item">
                <div class="topic-content">

                    <div class="grid-container">
                        <div class="title">
                            <h2>{{ $topic->title }}</h2>
                        </div>
                        
                        <a href="{{route('routeListTopicByID', $topic->id)}}" class="view-topic">
                            Visualizar &nbsp;
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>

                    <div class="description">
                        <p>{{ $topic->description }}</p>
                    </div>
                    

                </div>
            </div>

        @endforeach
    </div>

@endsection