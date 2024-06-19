@extends('layouts.layout')

@section('header', 'Listar Todos os Usuários')

@section('content')
    <table>
        <tr>
            <td>Nome</td>
            <td>Email</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </table>
@endsection