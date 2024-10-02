@extends('layouts.header')

@section('style')
    <style>
        .topic-item{
            position: relative;
            max-width: 75%;
            height: min-content;
            margin: 2% 12% 2% 12%;
            border-radius: 5px;
            background-color: rgb(65, 84, 189);
            padding: 5px 10px 5px 10px;
        }
        .topic-content{
            font-size: 18pt;
        }
        .grid-container{
            display: grid;
            grid-template-columns: max-content max-content max-content;
        }
        .description{
            margin-top: 2%;
            font-size: 13pt;
        }
        .view-topic{
            /* left: 0;
            right: 0;
            top: 0;
            bottom: 0; */
            width: 110px;
            height: 22px;
            /* position: relative; */
            display: block;
            border-radius: 5px;
            margin-top: 8px;
            margin-left: 167px;
            padding: 2px 10px 2px 10px;
        }
        .create-topic, .view-categories, .view-tags{
            /* left: 0;
            right: 0;
            top: 0;
            bottom: 0; */
            width: 130px;
            height: 22px;
            position: relative;
            margin-top: 5px;
            margin-left: 30px;
        }
        .view-categories{
            margin-left: 0px;
        }
        .view-tags{
            margin-left: 0px;
            width: 80px;
        }
    </style>
@endsection

@section('content')
    @if(Auth::check())
        <div class="grid-container">
            <a href="{{route('routeCreateTopic')}}" class="create-topic">
                <i class="fa-solid fa-plus"></i>
                &nbsp; Criar Tópico
            </a>
    
            <a href="{{route('routeListAllCategories')}}" class="view-categories">
                <i class="fa-solid fa-eye"></i>
                &nbsp; Categorias
            </a>

            <a href="{{route('routeListAllTags')}}" class="view-tags">
                <i class="fa-solid fa-eye"></i>
                &nbsp; Tags
            </a>
        </div>
    @endif

    <div class="topics-container">
        @foreach($topics as $topic)

            <div class="topic-item">
                <div class="topic-content text">

                    <div class="grid-container">
                        <div class="title">
                            <h2>{{ $topic->title }}</h2>
                        </div>
                        
                        <a href="{{route('routeListTopicByID', $topic->id)}}" class="view-topic">
                            Visualizar
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