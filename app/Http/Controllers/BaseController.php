<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Category;
use App\Material;
use App\Program;
use App\Question;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('base.index', compact('programs'));
    }

    public function index_programs($id)
    {
        $program = Program::where('id', $id)->first();
        $categories = Category::where('program_id', $program->id)->get();
        return view('base.programs.index', compact('program', 'categories'));
    }
    public function show_materials($id)
    {
        $material = Material::where('id', $id)->first();
        return view('base.materials.index', compact('material'));
    }
    public function test($id)
    {
        $program = Program::where('id', $id)->first();
        $questions = Question::where('program_id', $program->id)->inRandomOrder()->get();
        return view('base.programs.test', compact('program', 'questions'));
    }
    public function test_check(Request $request)
    {
        $array = [];
        $scores = 0;
        for ($i = 0; $i <= 9; $i++) {
            $answer_id = $request->input($i);
            $answer = Answer::where('id', $answer_id)->first();
            if ($answer['correct'] == 1) {$score = 1;}
            else $score = 0;
            $question = Question::where('id', $answer['question_id'])->first();
            $correct_answer = Answer::where('question_id', $question['id'])->where('correct', 1)->first();
            $array[$i]['question'] = $question;
            $array[$i]['answer'] = $answer;
            $array[$i]['correct_answer'] = $correct_answer;
            $scores = $scores + $score;
        }
        if ($scores >= 8) {
            if (Result::where('user_id', Auth::user()->id)->where('program_id', $array[9]['question']['program_id'])->count() == 0)
            {
                Result::create([
                    'name' => Auth::user()->name.' Успешно сдал тест!',
                    'user_id' => Auth::user()->id,
                    'program_id' => $array[9]['question']['program_id'],
                    'scores' => $scores
                ]);
            }
        }
        $results = $array;
        return view('base.programs.results', compact('results', 'scores'));
    }
}
