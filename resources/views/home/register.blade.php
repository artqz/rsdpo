@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
    <br>
    <h1>Регистрация в системе</h1>
    <hr>
    {{ Form::open(['url' => 'register', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('name', 'Ф.И.О.') }}
            {{ Form::text('name', old('name'), ['placeholder' => 'Петров И.И.', 'class' => 'form-control']) }}
            <small id="nameHelp" class="form-text text-muted">Фамилия и инициалы.</small>
            <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Эл. почта') }}
            {{ Form::text('email', old('email'), ['placeholder' => 'example@example.ru', 'class' => 'form-control']) }}
            <small id="emailHelp" class="form-text text-muted">Электроная почта, необходима для оповещения.</small>
            <small id="emailHelp" class="text-danger">{{ $errors->first('email') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Пароль') }}
            {{ Form::password('password', ['placeholder' => '******', 'class' => 'form-control']) }}
            <small id="passwordHelp" class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <div class="form-group">
            {{ Form::button('<i class="fa fa-user-circle-o"></i> Подать заявку', ['type' => 'submit', 'class' => 'btn btn-success']) }}
        </div>
    {{ Form::close() }}

@endsection