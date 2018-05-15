@extends('layouts.app')

@section('title', 'Учебная база')

@section('content')
    <br>
    <h1>Учебная программа - {{ $program->name }}</h1>
    <hr>
    @foreach($categories as $category)
        {{ $category->name }}:<br>
        @foreach($category->materials as $material)
            - <a href="{{ url('base/materials/'. $material->id) }}">{{ $material->name }}</a><br>
        @endforeach
    @endforeach

@endsection