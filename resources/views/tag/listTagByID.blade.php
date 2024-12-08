@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/tag/listTagByID.css')}}">
    @if($tag != null)
        <div class="main">
            <div class="card">
                <div class="table">
                    <p class="title">Informações da Tag</p>
                    <div class="content">
                        <div class="line">
                            <h4>Título: </h4>
                            <p>{{ $tag->title }}</p>
                        </div>
                    </div>
                </div>
                @if(Auth::check())
                    <div class="buttons">
                        <a href="{{route('routeEditTag', $tag->id)}}" class="edit">Editar Tag &nbsp;
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                        <form action="{{route('routeDeleteTag', $tag->id)}}" method="post">
                            @csrf
                            @method('delete')
            
                            <button class="delete" type="submit">Excluir Tag &nbsp;
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

    @else
        <div>Tag não encontrada!</div>
    @endif
@endsection