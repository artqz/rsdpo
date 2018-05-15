<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Program;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::paginate(30);
        $categories = Category::all();
        return view('admin.programs.index', compact('programs', 'categories'));
    }
    public function show($id)
    {
        $program = Program::where('id', $id)->first();
        //2 - Учителя
        $users = User::where('role_id', 2)->pluck('name', 'id');
        $categories = Category::where('program_id', $program->id)->get();
        return view('admin.programs.edit', compact('program', 'users', 'categories'));
    }
    public function create()
    {
        //2 - Учителя
        $users = User::where('role_id', 2)->pluck('name', 'id');
        return view('admin.programs.create', compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'user_id' => 'required'
        ]);
        $program = Program::create([
            'name' => $request->input('name'),
            'user_id' =>$request->input('user_id')
        ]);
        return redirect('admin/programs/'. $program->id)
            ->with([
                'flash_message' => 'Вы успешно создали учебную программу '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'user_id' => 'required'
        ]);

        Program::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'user_id' =>$request->input('user_id')
            ]);
        return redirect('admin/programs/'. $id)
            ->with([
                'flash_message' => 'Вы успешно обновили учебную программу',
                'flash_message_status' => 'success',
            ]);
    }
    public function delete(Request $request, $id)
    {
        $program = Program::where('id', $id)->first();
        Program::where('id', $id)
            ->update([
                'is_hide' => true,
            ]);
        return redirect('admin/programs/')
            ->with([
                'flash_message' => 'Вы успешно удалили программу '. $program->name,
                'flash_message_status' => 'success',
            ]);
    }
    public function restore(Request $request, $id)
    {
        $program = Program::where('id', $id)->first();
        Program::where('id', $id)
            ->update([
                'is_hide' => false,
            ]);
        return redirect(url()->previous())
            ->with([
                'flash_message' => 'Вы успешно восстановили программу '. $program->name,
                'flash_message_status' => 'success',
            ]);
    }
}
