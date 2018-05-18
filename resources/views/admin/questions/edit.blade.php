@extends('layouts.app')

@section('title', 'Редактировать раздел учебной программы')

@section('content')
    <br>
    {!! Breadcrumbs::render('admin.questions.edit', $question) !!}
    <h1>Редактировать вопрос</h1>
    <hr>
    @if(!$question->is_hide)
        {{ Form::open(['url' => 'admin/questions/'.$question->id, 'method' => 'post']) }}
        <div class="form-group">
            {{ Form::label('program_id', 'Учебная программа') }}
            {{ Form::select('program_id', $programs, $question->program_id, ['id' => 'program_id', 'class' => 'form-control']) }}
            <small id="programHelp" class="form-text text-muted">К какой учебной программе относиться вопрос.</small>
            <small id="programHelp" class="text-danger">{{ $errors->first('program_id') }}</small>
        </div>
        <div class="form-group">
            {{ Form::label('name', 'Вопрос') }}
            {{ Form::text('name', $question->name, ['placeholder' => 'Что нужно делать при...', 'class' => 'form-control']) }}
            <small id="nameHelp" class="form-text text-muted">Отображается в билете.</small>
            <small id="nameHelp" class="text-danger">{{ $errors->first('name') }}</small>
        </div>

        <a href="{{ url('admin/questions/') }}" class="btn btn-secondary">Вернуться назад</a>
        {{ Form::submit('Изменить', ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
        <br>
        <h2>Изображение для вопроса</h2>
        <hr>
        @if($question->image)
            <img src="{{Illuminate\Support\Facades\Storage::url($question->image)}}" alt="{{ $question->name }}" height="200px">
        @endif
        <br><br>
        {{ Form::open(['url' => 'admin/questions/'.$question->id.'/upload_image', 'method' => 'post', 'files' => 'true', 'enctype'=>'multipart/form-data']) }}
            <div class="form-group">
                {{ Form::label('image', 'Изображение') }}
                {{ Form::file('image', ['class' => 'form-control']) }}
                <small id="imageHelp" class="form-text text-muted">Иногда необходимо увидеть изображение чтобы ответить.</small>
                <small id="imageHelp" class="text-danger">{{ $errors->first('image') }}</small>
            </div>
            {{ Form::submit('Обновить', ['class' => 'btn btn-success']) }}
        {{ Form::close() }}
        <br>
        <h2>Варианты ответов</h2>
        <hr>
        <div class="float-right"><a href="{{ url('admin/questions/'. $question->id .'/answers/create') }}" class="btn btn-success">Добавить ответ</a></div>
        <br><br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Вариант ответа</th>
                <th>Тип</th>
                <th>Управление</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($answers as $answer)
                <tr class="{{ ($answer->correct) ? 'success' : ''}}">
                    <td>{{ $answer->name }} {{ ($answer->is_hide) ? '(Удален)' : '' }}</td>
                    <td>{{ ($answer->correct) ? 'Верный' : 'Ложный'}}</td>
                    <td>
                        <a href="{{ url('admin/answers/' . $answer->id) }}" class="btn btn-primary btn-sm" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> Редактировать</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <p>Данный раздел учебной программы удален!</p>
        <div class="form-group">
            <a href="{{ url('admin/questions/'.$question->id) }}" class="btn btn-secondary">Вернуться назад</a>
            @if($question->is_hide)
                <a href="{{ url('admin/questions/'. $question->id .'/restore') }}" class="btn btn-primary" onclick="return confirm('Вы точно хотите восстановить этот вопрос?')"><i class="fa fa-history" aria-hidden="true"></i> Восстановить</a>
            @else
                <a href="{{ url('admin/questions/'. $question->id .'/delete') }}" class="btn btn-danger" onclick="return confirm('Точно удалить?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
            @endif
        </div>
    @endif
@endsection