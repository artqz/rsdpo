@extends('layouts.app')

@section('title', 'Редактировать раздел учебной программы')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.categories.show', $category) !!}
    <h1>Редактировать раздел учебной программы</h1>
    <hr>
    @if(!$category->is_hide)
    {{ Form::open(['url' => 'admin/categories/'.$category->id, 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('name', 'Название раздела') }}
            {{ Form::text('name', $category->name, ['placeholder' => 'Законы', 'class' => 'form-control']) }}
            <small id="nameHelp" class="form-text text-muted">Требуется для наполнения материалами.</small>
            <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
        </div>

        <a href="{{ url('admin/programs/'.$category->program->id) }}" class="btn btn-secondary">Вернуться назад</a>
        {{ Form::submit('Изменить', ['class' => 'btn btn-success']) }}
        @if($category->is_hide)
            <a href="{{ url('admin/categories/'. $category->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить этот раздел?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
        @else
            <a href="{{ url('admin/categories/'. $category->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
        @endif
    {{ Form::close() }}
    <br>
        <h2>Материалы</h2>
        <hr>
        <div class="float-right">
            <a href="{{ url('admin/categories/'.$category->id.'/materials/create') }}" class="btn btn-success btn-sm" role="button"><i class="fa fa-book" aria-hidden="true"></i> Добавить учебный материал</a>
        </div>
    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Название материала</th>
            <th>Расположение</th>
            <th>Управление</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($materials as $material)
            <tr>
                <td>{{ $material->name }} {{ ($material->is_hide) ? '(Удален)' : '' }}</td>
                <td><a href="{{Illuminate\Support\Facades\Storage::url($material->path)}}">{{ $material->path }}</a></td>
                <td>
                    @if($material->is_hide)
                        <a href="{{ url('admin/materials/'. $material->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить этот материал?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
                    @else
                        <a href="{{ url('admin/materials/'. $material->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @else
        <p>Данный раздел учебной программы удален!</p>
        <div class="form-group">
            <a href="{{ url('admin/programs/'.$category->program->id) }}" class="btn btn-secondary">Вернуться назад</a>
            @if($category->is_hide)
                <a href="{{ url('admin/categories/'. $category->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить этот раздел?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
            @else
                <a href="{{ url('admin/categories/'. $category->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
            @endif
        </div>
    @endif
@endsection