@extends('layouts.app')

@section('title', 'Учебная база')

@section('content')
    <br>
    {!! Breadcrumbs::render('base') !!}

    <h1>Учебная база</h1>
    @if(Auth::user())
        Вы вошли, как {{ Auth::user()->name }}
        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Выйти
        </a>
    @endif
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <hr>
    @if(Auth::user()->programs->count() > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Вам доступны следующие учебные программы:</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach(Auth::user()->programs as $program)
            <tr>
                <td>- <a href="{{ url('base/programs/' . $program->id) }}">{{ $program->name }}</a></td>
                <td align="center"><a href="{{ url('base/programs/' . $program->id.'/test') }}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Пройти тест</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Внимание!</h3>
            </div>
            <div class="panel-body">
                <p>Как только пройдет оплата за обучение, Вам будут доступны учебные программы.</p>
                <p>Для входа используйте логин <b>{{ Auth::user()->login }}</b>, и пароль который вводили при регистрации.</p>
            </div>
        </div>
    @endif

@endsection