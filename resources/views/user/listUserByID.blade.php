@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/user/listUserByID.css')}}">
    @if($user != null)
        {{-- <table>
            <tr>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>{{ $user->email }}</td>
            </tr>
        </table> --}}
        <div class="main">
            <div class="card">
                <p class="title">Suas informações de usuário</p>
                <div class="grid-container">
                    @if($user->photo == null)
                        <img class="picture" src="/storage/images/blank-profile-picture-973460_1280.webp" alt="Foto de Perfil">
                    @else
                        <img class="picture" src="/storage/{{ $user->photo }}" alt="Foto de Perfil">
                    @endif
                    <div class="info">
                        <div>
                            <p class="name">Nome</p>
                            <p>{{$user->name}}</p>
                        </div>
                        <div>
                            <p class="email">Email</p>
                            <p>{{$user->email}}</p>
                        </div>
                    </div>
                </div>
                <div class="buttons">
                    <a href="{{route('routeEditUser', [$user->id])}}" class="edit">Editar usuário &nbsp;
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    
                    <form action="{{route('routeDeleteUser', [$user->id])}}" method="post">
                        @csrf <!--tag em php para o token funcionar-->
                        @method('delete')
                        
                        <button class="delete" type="submit">Excluir Usuário &nbsp;
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    {{-- <span class="message">{{ session('message') }}</span> --}}
                </div>
            </div>
        </div>

        {{-- <!-- Área de excluir usuário -->
        <form action="{{ route('routeDeleteUser', [$user->id]) }}" method="post">
            <h2>Excluir Usuário</h2>
            @csrf <!--tag em php para o token funcionar-->
            @method('delete')

            <input type="submit" value="Excluir">
        </form> --}}
    @else
        <div>Usuário não encontrado!</div>
        
    @endif
@endsection