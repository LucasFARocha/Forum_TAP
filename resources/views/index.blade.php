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
            background-color: rgb(99, 135, 168);
            color: #ffffffdd;
            text-decoration: none;
            border-radius: 5px;
            margin-left: 80%;
            padding: 2px 10px 2px 10px;
        }
        .view-topic:hover{
            background-color: rgb(83, 114, 144);
        }
    </style>
@endsection

@section('content')

    <div class="topics-container">
        @foreach($topics as $topic)

            <div class="topic-item">
                <div class="topic-content">

                    <div class="title">
                        <h2>{{ $topic->title }}</h2>
                    </div>
                    <div class="description">
                        <p>{{ $topic->description }}</p>
                    </div>

                </div>

                <a href="{{route('routeListTopicByID', $topic->id)}}" class="view-topic">
                    Visualizar
                </a>
            </div>

        @endforeach
    </div>

@endsection