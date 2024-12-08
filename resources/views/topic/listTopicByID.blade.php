@extends('layouts.header')

@php
    Carbon\Carbon::setLocale('pt-br');
@endphp
@section('content')
    <link rel="stylesheet" href="{{ asset('css/topic/listTopicByID.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment/comment.css') }}">

    @if($topic != null)
        <div class="main">
            <div class="card">
                <div class="head">
                    <div class="tags-container">
                        @foreach($tags as $tag)
                            <div class="tag">#{{$tag->title}}</div>
                        @endforeach
                    </div>

                    <div class="category">{{ $category->title }}</div>
                    <h4 class="title">{{ $topic->title }}</h4>
                </div>
                <div class="content">
                    <p class="description">{{ $topic->description }}</p>
                    @if($topic->post->image != null)
                        <img class="image topic-image" src="/storage/{{ $topic->post->image }}" alt="Imagem do tópico">
                    @endif

                    @if($user)
                        <p class="created-at">Criado {{ $topic->created_at->diffForHumans() }} por: {{$user->name}}<p>
                    @else
                        <p class="created-at">Criado {{ $topic->created_at->diffForHumans() }} por: <i>Usuário removido</i><p>
                    @endif
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

            <div class="card comment-section">
                @if(Auth::check())
                    <form action="{{route('routeCreateComment', $topic->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form">

                            <textarea id="content" name="content" placeholder="Comente algo bacana"
                                value="{{ old('content') }}" required></textarea>
                            @error('content') <span>{{ $message }}</span> @enderror

                            <input type="file" id="image" name="image" placeholder="Imagem do Tópico" 
                            value="{{ old('image') }}">
                            @error('image') <span>{{ $message }}</span> @enderror

                            <input type="submit" value="Comentar">
                            {{-- <a href="" class="create-comment">
                                <i class="fa-solid fa-plus"></i>
                                &nbsp; Comentar
                            </a> --}}
                        </div>
                    </form>
                @endif

                <div class="comments">
                    @foreach($comments as $comment)
                    <div class="card content comment-content">
                        @foreach($users as $user)
                            @if($comment->post->user_id == $user->id)
                                <p class="comment-user">{{ $user->name }}</p>
                            @endif
                        @endforeach

                        <p>{{ $comment->content }}</p>
                        @if(!empty($comment->post->image))
                            <img class="image comment-image" src="/storage/{{ $comment->post->image }}" alt="Imagem do comentário">
                        @endif
                    </div>
                    @endforeach
            </div>
            </div>

        </div>
    @else
        <div>Tópico não encontrado!</div>
    @endif
@endsection