@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="{{asset('css/tag/listAllTags.css')}}">
    @if(Auth::check())
        <a href="{{route('routeCreateTag')}}" class="create-tag">
            <i class="fa-solid fa-plus"></i>
            &nbsp; Criar Tag
        </a>
    @endif

    <div class="tags-container">
        @foreach($tags as $tag)
            <div class="tag-item text">

                <div class="grid-container">
                    <div class="title">
                        <h2>{{ $tag->title }}</h2>
                    </div>
                    <a href="{{route('routeListTagByID', $tag->id)}}" class="view-tag">
                        Visualizar &nbsp;
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>
                
            </div>
        @endforeach
    </div>
@endsection