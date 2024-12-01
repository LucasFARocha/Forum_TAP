@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/layouts/form.css') }}">
    <form action="{{route('routeCreateTag')}}" method="post">
        <h2 class="text black">Criar Tag</h2>

        @csrf <!--tag em php para o token funcionar-->

        <div class="form">
            <input type="text" id="title" name="title" placeholder="Título da Tag"
                value="{{ old('title') }}" required>
            <!--Essa área só existe em caso de erro-->
            @error('title') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Confirmar">
        </div>
    </form>
@endsection