<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswersController extends Controller
{
    public function create($id)
    {
        $question = Question::where('id', $id)->first();
        return view('admin.questions.answers.create', compact('question'));
    }
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'correct' => 'required'
        ]);

        $question = Question::where('id', $id)->first();

        $answers_count = Answer::where('question_id', $id)->count();

        if ($answers_count >= 4) {
            return redirect('admin/questions/'. $question->id)
                ->with([
                    'flash_message' => 'Нельзя добавить более 4 вариантов!',
                    'flash_message_status' => 'danger',
                ]);
        }
        Answer::create([
            'name' => $request->input('name'),
            'correct' => $request->input('correct'),
            'question_id' => $question->id
        ]);
        return redirect('admin/questions/'. $question->id)
            ->with([
                'flash_message' => 'Вы успешно добавили вариант ответа '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }
    public function show($id)
    {
        $answer = Answer::where('id', $id)->first();
        return view('admin.questions.answers.edit', compact( 'answer'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'correct' => 'required'
        ]);

        $answer = Answer::where('id', $id)->first();

        Answer::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'correct' =>$request->input('correct')
            ]);
        return redirect('admin/questions/'. $answer->question->id)
            ->with([
                'flash_message' => 'Вы успешно обновили вариант ответа',
                'flash_message_status' => 'success',
            ]);
    }
}
