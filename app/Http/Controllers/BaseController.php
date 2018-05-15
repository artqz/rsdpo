<?php

namespace App\Http\Controllers;

use App\Category;
use App\Material;
use App\Program;
use Illuminate\Http\Request;

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
}
