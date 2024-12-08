@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="{{asset('css/user/listAllUsers.css')}}">
    <p class="title">Usuários</p>

    @foreach($users as $user)
        <div class="main">
            <div class="card">
                <table>
                    <tbody>
                        <tr>
                            <td>Nome: </td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="" class="timeout">Suspender usuário &nbsp;
                                    <i class="fa-regular fa-clock"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="" class="ban">Banir usuário &nbsp;
                                    <i class="fa-solid fa-ban"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection