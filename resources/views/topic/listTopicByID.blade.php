@extends('layouts.header')

@php
    Carbon\Carbon::setLocale('pt-br');
@endphp
@section('content')
    <link rel="stylesheet" href="{{ asset('css/topic/listTopicByID.css') }}">
    @if($topic != null)
        <div class="main">
            <div class="card">
                <div class="table">
                    <p class="title">Informações do Tópico</p>
                    <div class="content">
                        <div class="line">
                            <h4>Título: </h4>
                            <p>{{ $topic->title }}</p>
                        </div>
                        <div class="line">
                            <h4>Descrição: </h4>
                            <p>{{ $topic->description }}</p>
                        </div>
                        <div class="line">
                            <p>Criado {{ $topic->created_at->diffForHumans() }}<p>
                        </div>
                    </div>
                </div>
                @if(Auth::check() and Auth::user()->id == $topic->post->user_id)
                    <div class="buttons"> 
                        <a href="" class="edit">Editar Tópico &nbsp;
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
            <a href="" class="create-comment">
                <i class="fa-solid fa-plus"></i>
                &nbsp; Comentar
            </a>
        </div>
    @else
        <div>Tópico não encontrado!</div>

    @endif
@endsection