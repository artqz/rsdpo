@extends('layouts.app')

@section('title', 'Добавить учебную программу')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.programs.create') !!}
    <h1>Добавить учебную программу</h1>
    <hr>
{{ Form::open(['url' => 'admin/programs', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('name', 'Название учебной программы') }}
        {{ Form::text('name', null, ['placeholder' => 'Охрана труда', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Требуется для выбора обучения.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('user_id', 'Ответственный') }}
        {{ Form::select('user_id', $users, null, ['id' => 'user_id', 'class' => 'form-control']) }}
        <small id="userHelp" class="text-danger">{{ $errors->first('user_id') }}</small>
    </div>

    <a href="{{ url('admin/programs/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection