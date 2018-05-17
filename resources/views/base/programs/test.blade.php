@extends('layouts.app')

@section('title', 'Тест')

@section('content')
    <br>
    <h1>Тест по учебной програме - {{ $program->name }}</h1>
    <hr>
    {{ Form::open(['url' => 'base/test/check', 'method' => 'post']) }}
    @foreach($questions as $index_question => $question)
        <div class="bs-callout bs-callout-warning" id="callout-alerts-dismiss-use-button">
            <h4>{{ $index_question+1 }}. {{ $question->name }}</h4>
            <div class="row">
                @foreach($question->answers as $j => $answer)
                <div class="col-lg-6">
                    <div class="input-group margin">
                        <span class="input-group-addon">
                            <input type="radio" name="{{$index_question}}" value="{{ $answer->id }}" {{ old($index_question) == $answer->id ? 'checked' : '' }}>
                        </span>
                        <span type="text" class="form-control">{{ $answer->name }}</span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                @endforeach
            </div>
            @if($errors->first($index_question))
                <div id="nameHelp" class="text-danger">Вы не выбрали вариант!</div>
            @endif
        </div>
    @endforeach
    <input type="submit" value="Отправить">
    {{ Form::close() }}
@endsection