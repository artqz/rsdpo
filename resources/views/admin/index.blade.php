@extends('layouts.app')

@section('title', 'Панель администратора')

@section('content')
    <br>
    <h1>Панель администратора</h1>
    <hr>
    <div>- <a href="{{ url('/admin/users') }}">Управление пользователями</a></div>
    <div>- <a href="{{ url('/admin/programs') }}">Управление учебными программами</a></div>
    <div>- <a href="{{ url('/admin/questions') }}">Добавление учебных вопросов</a></div>

@endsection