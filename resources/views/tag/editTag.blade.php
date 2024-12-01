@extends('layouts.header')
@section('content')
<link rel="stylesheet" href="{{asset('css/layouts/form.css')}}">
<form action="{{ route('routeEditTag', [$tag->id])}}" method="post">
    <h2 class="text black">Editar Tag</h2>

    @csrf <!--tag em php para o token funcionar-->
    @method('put')

    <div class="form">
        <input type="text" id="title" name="title" placeholder="Título da Tag"
            value="{{ old('title') }}">
        <!--Essa área só existe em caso de erro-->
        @error('title') <span>{{ $message }}</span> @enderror

        <input type="submit" value="Editar">
    </div>
</form>
@endsection