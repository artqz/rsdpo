@extends('layouts.app')

@section('title', 'Добавить вопрос для теста')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.questions.create') !!}
    <h1>Добавить вопрос для теста</h1>
    <hr>
    {{ Form::open(['url' => 'admin/questions/', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('program_id', 'Учебная программа') }}
        {{ Form::select('program_id', $programs, 2, ['id' => 'program_id', 'class' => 'form-control']) }}
        <small id="programHelp" class="form-text text-muted">К какой учебной программе относиться вопрос.</small>
        <small id="programHelp" class="text-danger">{{ $errors->first('program_id') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Вопрос') }}
        {{ Form::text('name', null, ['placeholder' => 'Что нужно делать при...', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Отображается в билете.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <a href="{{ url('admin/questions/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
    {{ Form::close() }}
@endsection