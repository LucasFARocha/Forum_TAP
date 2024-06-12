@extends('layouts.gpt')

@section('header', 'Listar Apenas Um Usuário')

@section('content')
    @if($user != null)
        <table>
            <tr>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>{{ $user->email }}</td>
            </tr>
        </table>

        <!-- Área de editar usuário -->
        <form action="{{ route('routeEditUser', [$user->id]) }}" method="post">
            <h2>Editar Usuário</h2>
            <span>{{ session('message') }}</span>
            @csrf <!--tag em php para o token funcionar-->
            @method('put')

            <input type="text" id="name" name="name" placeholder="Nome de usuário"
                value="{{ old('name') }}">
            <!--Essa área só existe em caso de erro-->
            @error('name') <span>{{ $message }}</span> @enderror

            <input type="email" id="email" name="email" placeholder="Email"
                value="{{ old('email') }}">
            @error('email') <span>{{ $message }}</span> 
            @enderror

            <input type="password" id="password" name="password" placeholder="Senha">
            @error('password') <span>{{ $message }}</span> @enderror

            <input type="submit" value="Editar">
        </form>

        <!-- Área de excluir usuário -->
        <form action="{{ route('routeDeleteUser', [$user->id]) }}" method="post">
            <h2>Excluir Usuário</h2>
            @csrf <!--tag em php para o token funcionar-->
            @method('delete')

            <input type="submit" value="Excluir">
        </form>
        @else
        <div>Usuário não encontrado!</div>
        
    @endif
@endsection