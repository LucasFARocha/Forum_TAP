@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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