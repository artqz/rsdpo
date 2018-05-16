@extends('layouts.app')

@section('title', 'Добро пожаловать!')

@section('content')
    <br>
    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>
        <p>Данный сервис предназначен для дистанционного обучения.</p>
        <p><div>В настоящий момент мы обучаем по следующим программам:</div>
            @foreach($programs as $program)
                <div>- {{ $program->name }}</div>
            @endforeach
        </p>
        <p>
            Для прохождения обучения необходимо <a href="{{ url('/register') }}">подать заявку</a>.
        </p>
    </div>
    <h1>Войти в систему</h1>
    <hr>
    @if(Auth::guest())
    {{ Form::open(['url' => 'login', 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('login', 'Логин') }}
            {{ Form::text('login', null, ['placeholder' => 'Ваш логин', 'class' => 'form-control']) }}
            <small id="loginHelp" class="text-danger">{{ $errors->first('login') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Пароль') }}
            {{ Form::password('password', ['placeholder' => '******', 'class' => 'form-control']) }}
            <small id="passwordHelp" class="text-danger">{{ $errors->first('password') }}</small>
        </div>
        <div class="form-group">
            {{ Form::button('<i class="fa fa-user-circle-o"></i> Войти', ['type' => 'submit', 'class' => 'btn btn-success']) }}
        </div>
    {{ Form::close() }}
    @else
        <a href="{{ url('/base') }}" class="btn btn-primary"><i class="fa fa-book"></i> Перейти в учебную базу</a>
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
            <a href="{{ url('/admin') }}" class="btn btn-danger"><i class="fa fa-cog" aria-hidden="true"></i> Перейти в панель управления</a>
        @endif
    @endif

@endsection