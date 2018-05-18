@extends('layouts.app')

@section('title', 'Добавить пользователя')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.users.create') !!}
    <h1>Добавить пользователя</h1>
    <hr>
{{ Form::open(['url' => 'admin/users', 'method' => 'post']) }}
    @if(Auth::user()->role_id ==1)
    <div class="form-group">
        {{ Form::label('login', 'Логин') }}
        {{ Form::text('login', null, ['placeholder' => 'kuznetsov', 'class' => 'form-control']) }}
        <small id="loginHelp" class="form-text text-muted">Логин сотрудника, требуется для авторизации в программе.</small>
        <small id="loginHelp" class="text-danger">{{ $errors->first('login') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('role_id', 'Роль') }}
        {{ Form::select('role_id', $roles, 4, ['id' => 'role_id', 'class' => 'form-control']) }}
        <small id="roleHelp" class="text-danger">{{ $errors->first('role_id') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('rang', 'Должность') }}
        {{ Form::text('rang', 'Ученик', ['placeholder' => 'Инженер', 'class' => 'form-control']) }}
        <small id="rangHelp" class="form-text text-muted">Занимаемая должность сотрудника.</small>
        <small id="rangHelp" class="text-danger">{{ $errors->first('rang') }}</small>
    </div>
    @endif
    <div class="form-group">
        {{ Form::label('email', 'Эл. почта') }}
        {{ Form::text('email', null, ['placeholder' => 'info@serov112.ru', 'class' => 'form-control']) }}
        <small id="emailHelp" class="form-text text-muted">Электроная почта сотрудника, необходима для оповещения.</small>
        <small id="emailHelp" class="text-danger">{{ $errors->first('email') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Ф.И.О.') }}
        {{ Form::text('name', null, ['placeholder' => 'Кузнецов А.А.', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Фамилия и инициалы сотрудника.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Пароль') }}
        {{ Form::password('password', ['placeholder' => '******', 'class' => 'form-control']) }}
        <small id="passwordHelp" class="form-text text-muted">Пароль от учетной записи.</small>
        <small id="passwordHelp" class="text-danger">{{ $errors->first('password') }}</small>
    </div>
    <a href="{{ url('admin/users/') }}" class="btn btn-default">Вернуться назад</a>
    {{ Form::submit('Зарегистрировать', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection