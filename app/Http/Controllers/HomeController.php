<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('home.index', compact('programs'));
    }
    public function register()
    {
        return view('home.register');
    }
}
