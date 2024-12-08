@extends('layouts.header')

@php
    Carbon\Carbon::setLocale('pt-br');
@endphp
@section('content')
    <link rel="stylesheet" href="{{ asset('css/topic/listTopicByID.css') }}">
    @if($topic != null)
        <div class="main">
            <div class="card">
                <div class="head">
                    <div class="tags-container">
                        @foreach($tags as $tag)
                            <div class="tag">#{{$tag}}</div>
                        @endforeach
                    </div>

                    <div class="category">{{ $category->title }}</div>
                    <h4 class="title">{{ $topic->title }}</h4>
                </div>
                <div class="content">
                    <p class="description">{{ $topic->description }}</p>
                    @if($topic->post->image != null)
                        <img class="topic-image" src="/storage/{{ $topic->post->image }}" alt="Imagem do tópico">
                    @endif
                    <p class="created-at">Criado {{ $topic->created_at->diffForHumans() }} por: {{$user->name}}<p>
                </div>
                @if(Auth::check() && Auth::user()->id == $topic->post->user_id)
                    <div class="buttons"> 
                        <a href="{{ route('routeEditTopic', [$topic->id]) }}" class="edit">Editar Tópico &nbsp;
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('routeDeleteTopic', [$topic->id]) }}" method="post">
                            @csrf
                            @method('delete')
            
                            <button class="delete" type="submit">Excluir Tópico &nbsp;
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            @if(Auth::check())
                <a href="" class="create-comment">
                    <i class="fa-solid fa-plus"></i>
                    &nbsp; Comentar
                </a>
            @endif
        </div>
    @else
        <div>Tópico não encontrado!</div>
    @endif
@endsection