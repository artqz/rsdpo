@extends('layouts.app')

@section('title', 'Учебная база')

@section('content')
    <br>
    <h1>Учебная база</h1>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Вам доступны следующие учебные программы:</th>
            </tr>
        </thead>
        <tbody>
        @foreach($programs as $program)
            <tr>
                <td>- <a href="{{ url('base/programs/' . $program->id) }}">{{ $program->name }}</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection