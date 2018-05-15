@extends('layouts.app')

@section('title', 'Тест')

@section('content')
    <br>
    <h1>Тест по учебной програме - {{ $program->name }}</h1>
    <hr>
    @foreach($questions as $key => $question)
        <div class="card" style="width: 70%;">
            @if($question->image)
                <img src="{{Illuminate\Support\Facades\Storage::url($question->image)}}" alt="{{ $question->name }}" class="card-img-top">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $key+1 }}. {{ $question->name }}</h5>
                <div>
                    @foreach($question->answers as $answer)
                        {{ $answer->name }}<br>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
    @endforeach

@endsection