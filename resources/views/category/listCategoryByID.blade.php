@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/category/listCategoryByID.css')}}">
    @if($category != null)
        <div class="main">
            <div class="card">
                <div class="table">
                    <p class="title">Informações da Categoria</p>
                    <div class="content">
                        <div class="line">
                            <h4>Título: </h4>
                            <p>{{ $category->title }}</p>
                        </div>
                        <div class="line">
                            <h4>Descrição: </h4>
                            <p>{{ $category->description }}</p>
                        </div>
                    </div>
                </div>
                @if(Auth::check())
                    <div class="buttons">
                        <a href="{{route('routeEditCategory', [$category->id])}}" class="edit">Editar Categoria &nbsp;
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        
                        <form action="{{route('routeDeleteCategory', [$category->id])}}" method="post">
                            @csrf
                            @method('delete')
            
                            <button class="delete" type="submit">Excluir Categoria &nbsp;
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

    @else
        <div>Categoria não encontrada!</div>
    @endif
@endsection