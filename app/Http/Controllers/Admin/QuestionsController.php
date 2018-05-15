<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Http\Controllers\Controller;
use App\Program;
use App\Question;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(30);
        return view('admin.questions.index', compact('questions'));
    }
    public function create()
    {
        $programs = Program::pluck('name', 'id');
        return view('admin.questions.create', compact('programs'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'program_id' => 'required'
        ]);

        $question = Question::create([
            'name' => $request->input('name'),
            'program_id' => $request->input('program_id')
        ]);
        return redirect('admin/questions/'. $question->id)
            ->with([
                'flash_message' => 'Вы успешно добавили вопрос '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }
    public function show($id)
    {
        $question = Question::where('id', $id)->first();
        $programs = Program::pluck('name', 'id');
        $answers = Answer::where('question_id', $question->id)->get();
        return view('admin.questions.edit', compact('question', 'programs', 'answers'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'program_id' => 'required'
        ]);

        Question::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'program_id' => $request->input('program_id')
            ]);

        return redirect('admin/questions/'. $id)
            ->with([
                'flash_message' => 'Вы успешно обновили вопрос '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }
}
