@extends('layouts.app')

@section('title', 'Просмотр учебного материала')

@section('content')
    <br>
    <h1>Учебный материал - {{ $material->name }}</h1>
    <hr>
    <a href="{{ url('base/programs/'.$material->category->program->id) }}" class="btn btn-secondary"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Вернуться назад</a>
    <br><br>
    <iframe src="{{Illuminate\Support\Facades\Storage::url($material->path)}}" width="100%" height="600"></iframe>


@endsection