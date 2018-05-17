<?php

namespace App\Http\Controllers\Admin;

use App\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultsController extends Controller
{
    public function index()
    {
        $results = Result::paginate(30);
        return view('admin.results.index', compact('results'));
    }
}
