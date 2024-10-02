@extends('layouts.header')
@section('style')
    <style>
        .tags-container{
            margin-left: 0px;
            margin-top: 20px;
            justify-content: center;
            display: grid;
            grid-template-columns: min-content min-content min-content min-content;
            grid-column-gap: 10px;
        }
        .tag-item{
            position: relative;
            width: min-content;
            margin: 2% 12% 2% 0;
            border-radius: 5px;
            background-color: rgb(65, 84, 189);
            padding: 20px 25px 25px 25px;
        }
        .grid-container{
            display: grid;
            grid-template-columns: min-content min-content;
            height: 30px;
        }
        .view-tag{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin-left: 20px;
            margin-top: 3px;
            width: 115px;
            height: fit-content;
            position: relative;
            border-radius: 5px;
        }
        .create-tag{
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            width: fit-content;
            height: fit-content;
            position: relative;
            margin-top: 5px;
        }
    </style>
@endsection
@section('content')
    @if(Auth::check())
        <a href="{{route('routeCreateTag')}}" class="create-tag">
            <i class="fa-solid fa-plus"></i>
            &nbsp; Criar Tag
        </a>
    @endif

    <div class="tags-container">
        @foreach($tags as $tag)
            <div class="tag-item">
                <div class="tag-content text">

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
            </div>
        @endforeach
    </div>
@endsection