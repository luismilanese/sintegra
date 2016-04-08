@extends('app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>CNPJ</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <th scope="row">{{ $result->id }}</th>
                    <td>{{ $result->user_id->name }}</td>
                    <td>{{ $result->cnpj }}</td>
                    <td><a href="/results/{{ $result->id }}">Ver resultado</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop