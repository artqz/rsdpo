@extends('layouts.app')

@section('title', 'Добавить раздел в учебную программу')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.categories.create') !!}
    <h1>Добавить раздел в учебную программу</h1>
    <hr>
{{ Form::open(['url' => 'admin/programs/'.$program->id.'/categories/', 'method' => 'post']) }}
    <div class="form-group">
        {{ Form::label('name', 'Название раздела') }}
        {{ Form::text('name', null, ['placeholder' => 'Законы', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Требуется для наполнения материалами.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>

    <a href="{{ url('admin/programs/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection