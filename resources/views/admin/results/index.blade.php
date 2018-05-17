@extends('layouts.app')

@section('title', 'Список всех пользователей')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.users') !!}
    <h1>Список успешных сдач</h1>
    <hr>

    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Ф.И.О.</th>
            <th>Программа</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($results as $result)
            <tr>
                <td>{{ $result->user->name}} </td>
                <td>{{ $result->program->name }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <nav class="nav justify-content-center">
        {{ $results->links('vendor.pagination.bootstrap-4') }}
    </nav>
@endsection