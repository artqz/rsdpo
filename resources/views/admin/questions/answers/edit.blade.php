@extends('layouts.app')

@section('title', 'Редактировать вариант ответа на вопрос')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.categories.create') !!}
    <h1>Редактировать вариант ответа на вопрос</h1>
    <hr>
    {{ Form::open(['url' => 'admin/answer/'.$answer->id, 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('name', 'Ответ') }}
        {{ Form::text('name', $answer->name, ['placeholder' => 'Вызвать скорую', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Варианты отображаются в тесте.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('correct', 'Тип вопроса') }}
        {{ Form::select('correct', [0 => 'Ложный', 1 => 'Верный'], $answer->correct, ['id' => 'program_id', 'class' => 'form-control']) }}
        <small id="correctHelp" class="form-text text-muted">Верный или ложный вариант ответа.</small>
        <small id="correctHelp" class="text-danger">{{ $errors->first('correct') }}</small>
    </div>

    <a href="{{ url('admin/questions/'.$answer->question->id) }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Изменить', ['class' => 'btn btn-success']) }}
    {{ Form::close() }}
@endsection