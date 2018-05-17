@extends('layouts.app')

@section('title', 'Список всех учебных программ')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.programs') !!}
    <h1>Список тестовых вопросов</h1>
    <hr>
    <div class="float-right">
        <a href="{{ url('admin/questions/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Добавить вопрос</a>
    </div>

    <br>
    {{ Form::open(['url' => 'admin/questions/search', 'method' => 'get']) }}
        {{ Form::text('name', null, ['placeholder' => 'Поиск...', 'class' => 'form-control']) }}
    {{ Form::close() }}
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Вопрос</th>
            <th>Программа</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($questions as $question)
            <tr>
                <td>{{ $question->name }} {{ ($question->is_hide) ? '(Удален)' : '' }}</td>
                <td>{{ $question->program->name }}</td>
                <td>
                    <a href="{{ url('admin/questions/' . $question->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <nav class="nav justify-content-center">
        {{ $questions->links('vendor.pagination.bootstrap-4') }}
    </nav>
@endsection