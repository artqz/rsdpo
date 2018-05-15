@extends('layouts.app')

@section('title', 'Редактор учебной программы')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.programs.show', $program) !!}
    <h1>Редактор учебной программы</h1>
    <hr>
    @if(!$program->is_hide)
    {{ Form::open(['url' => 'admin/programs/'. $program->id .'/update', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('name', 'Логин') }}
            {{ Form::text('name', $program->name, ['placeholder' => 'Охрана труда', 'class' => 'form-control']) }}
            <small id="nameHelp" class="form-text text-muted">Требуется для выбора обучения.</small>
            <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('user_id', 'Ответственный') }}
            {{ Form::select('user_id', $users, $program->user_id, ['id' => 'user_id', 'class' => 'form-control']) }}
            <small id="userHelp" class="text-danger">{{ $errors->first('user_id') }}</small>
        </div>

        <div class="form-group">
            <a href="{{ url('admin/programs/') }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
            {{ Form::button('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Изменить', ['type' => 'submit', 'class' => 'btn btn-success']) }}

            @if($program->is_hide)
                <a href="{{ url('admin/programs/'. $program->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить эту учебную программу?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
            @else
                <a href="{{ url('admin/programs/'. $program->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
            @endif
        </div>
    {{ Form::close() }}
    <h2>Разделы</h2>
    <hr>
    <div class="float-right"><a href="{{ url('admin/programs/'. $program->id .'/categories/create') }}" class="btn btn-success">Добавить раздел</a></div>
    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название раздела</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }} {{ ($category->is_hide) ? '(Удален)' : '' }}</td>
                <td>
                    <a href="{{ url('admin/categories/' . $category->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @else
        <p>Данная учебная программа удалена!</p>
    <div class="form-group">
        <a href="{{ url('admin/programs/') }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
        @if($program->is_hide)
            <a href="{{ url('admin/programs/'. $program->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить эту учебную программу?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
        @else
            <a href="{{ url('admin/programs/'. $program->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
        @endif
    </div>
    @endif
@endsection