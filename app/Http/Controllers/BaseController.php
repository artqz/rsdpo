<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('base.index', compact('programs'));
    }
}
