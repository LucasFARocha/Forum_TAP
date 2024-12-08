@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/category/listAllCategories.css')}}">
    @if(Auth::check())
        <a href=" {{route('routeCreateCategory')}} " class="create-category">
            <i class="fa-solid fa-plus"></i>
            &nbsp; Criar Categoria
        </a>
    @endif

    <div class="categories-container">
        @foreach($categories as $category)

            <div class="category-item">
                <div class="category-content">

                    <div class="grid-container">
                        <div class="title">
                            <h2>{{ $category->title }}</h2>
                        </div>
                        
                        <a href="{{route('routeListCategoryByID', $category->id)}}" class="view-category">
                            Visualizar &nbsp;
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </div>

                    <div class="description">
                        <p>{{ $category->description }}</p>
                    </div>

                </div>
            </div>

        @endforeach
    </div>
@endsection