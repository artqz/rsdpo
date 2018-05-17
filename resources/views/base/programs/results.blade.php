@extends('layouts.app')

@section('title', 'Учебная база')

@section('content')
    <br>
    {!! Breadcrumbs::render('base.programs') !!}

    <h1>Результаты теста</h1>
    <hr>
    @if($scores < 8)
        <div class="panel panel-danger"><div class="panel-heading">Вы не сдали тест!</div></div>
    @else
        <div class="panel panel-success"><div class="panel-heading">Вы успешно прошли тест, поздравляем! Результат передан преподавателю.</div></div>
    @endif
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge">{{ $scores }}</span>
            Количество правильных ответов
        </li>
    </ul>
    @foreach($results as $result)
        <div class="panel {{ $result['answer']['correct'] ? 'panel-success' : 'panel-danger' }}">
            <div class="panel-heading">{{ $result['question']['name'] }}</div>
            <div class="panel-body">
                Вы ответили: {{ $result['answer']['name'] }}
            </div>
            <div class="panel-footer">
                Правильный ответ: {{ $result['correct_answer']['name'] }}
            </div>
        </div>
    @endforeach
    @if($scores < 8)
        <a href="{{url('/base/programs/'.$results['0']['question']['program_id'].'/test')}}" class="btn btn-primary">Попробовать еще раз!</a>
    @else
        <a href="{{ url('/base') }}" class="btn btn-success">Вернуться назад</a>
    @endif
@endsection