@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/topic/listTopicByID.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment/listCommentByID.css') }}">

    <div class="main">
        <div class="card text">
            @if($comment->post->user_id == $user->id)
                <p class="comment-user">{{ $user->name }}</p>
            @endif

            <p class="content">{{ $comment->content }}</p>
            @if(!empty($comment->post->image))
                <img class="image comment-image" src="/storage/{{ $comment->post->image }}" alt="Imagem do comentário">
            @endif
            
            @if(Auth::check() && Auth::user()->id == $comment->post->user_id)
                <div class="buttons">
                    <a href="{{ route('routeEditComment', $comment->id) }}" class="edit edit-comment">Editar Comentário &nbsp;
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{  route('routeDeleteComment', $comment->id)  }}" method="post">
                        @csrf
                        @method('delete')
        
                        <button class="delete" type="submit">Excluir Comentário &nbsp;
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
    
@endsection