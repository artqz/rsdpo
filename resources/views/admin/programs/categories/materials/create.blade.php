@extends('layouts.app')

@section('title', 'Добавить учебный материал')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.categories.create') !!}
    <h1>Добавить учебный материал</h1>
    <hr>
{{ Form::open(['url' => 'admin/categories/'.$category->id.'/materials', 'method' => 'post', 'files' => 'true', 'enctype'=>'multipart/form-data']) }}
    <div class="form-group">
        {{ Form::label('name', 'Название учебного материала') }}
        {{ Form::text('name', null, ['placeholder' => 'Приказ ...', 'class' => 'form-control']) }}
        <small id="nameHelp" class="form-text text-muted">Отображается в списке учебной базы.</small>
        <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
    </div>
    <div class="form-group">
        {{ Form::label('doc', 'Документ') }}
        {{ Form::file('doc', ['class' => 'form-control']) }}
        <small id="docHelp" class="form-text text-muted">Прикрепленный документ. Необходимо загружать только PDF формат не более 20Мб!</small>
        <small id="docHelp" class="text-danger">{{ $errors->first('doc') }}</small>
    </div>

    <a href="{{ url('admin/programs/') }}" class="btn btn-secondary">Вернуться назад</a>
    {{ Form::submit('Добавить', ['class' => 'btn btn-success']) }}
{{ Form::close() }}
@endsection