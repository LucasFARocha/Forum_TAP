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
            </div>

        @endforeach
    </div>

@endsection