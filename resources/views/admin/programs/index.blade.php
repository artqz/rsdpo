@extends('layouts.app')

@section('title', 'Список всех учебных программ')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.programs') !!}
    <h1>Список учебных программ</h1>
    <hr>
    <div class="float-right">
        <a href="{{ url('admin/programs/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Добавить учебную программу</a>
    </div>

    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название учебной программы</th>
            <th>Ответственный</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($programs as $program)
            <tr>
                <td>{{ $program->name }} {{ ($program->is_hide) ? '(Удален)' : '' }}</td>
                <td>{{ $program->user->name }}</td>
                <td>
                    <a href="{{ url('admin/programs/' . $program->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <nav class="nav justify-content-center">
        {{ $programs->links('vendor.pagination.bootstrap-4') }}
    </nav>
@endsection