@extends('layouts.app')

@section('title', 'Добавить вариант ответа на вопрос')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.categories.create') !!}
    <h1>Добавить вариант ответа на вопрос</h1>
    <hr>
    {{ Form::open(['url' => 'admin/questions/'.$question->id.'/answers', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('name', 'Ответ') }}
        {{ Form::text('name', null, ['placeholder' => 'Вызвать скорую', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Варианты отображаются в тесте.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('correct', 'Тип вопроса') }}
        {{ Form::select('correct', [0 => 'Ложный', 1 => 'Верный'], 0, ['id' => 'program_id', 'class' => 'form-control']) }}
        <small id="correctHelp" class="form-text text-muted">Верный или ложный вариант ответа.</small>
        <small id="correctHelp" class="text-danger">{{ $errors->first('correct') }}</small>
    </div>

    <a href="{{ url('admin/questions/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
    {{ Form::close() }}
@endsection