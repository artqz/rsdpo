<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Material;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function create($id)
    {
        $program = Program::where('id', $id)->first();
        return view('admin.programs.categories.create', compact('program'));
    }
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        $materials = Material::all();
        return view('admin.programs.categories.edit', compact('category', 'materials'));
    }
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        $program = Program::where('id', $id)->first();

        if (!$program) {
            return redirect('admin/programs/')
                ->with([
                    'flash_message' => 'Такой учебной программы не существует!',
                    'flash_message_status' => 'success',
                ]);
        }
        Category::create([
            'name' => $request->input('name'),
            'program_id' => $program->id
        ]);
        return redirect('admin/programs/'. $program->id)
            ->with([
                'flash_message' => 'Вы успешно создали учебную программу '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }
    public function delete(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        Category::where('id', $id)
            ->update([
                'is_hide' => true,
            ]);
        return redirect('admin/programs/'. $category->program->id)
            ->with([
                'flash_message' => 'Вы успешно удалили раздел '. $category->name,
                'flash_message_status' => 'success',
            ]);
    }
    public function restore(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        Category::where('id', $id)
            ->update([
                'is_hide' => false,
            ]);
        return redirect(url()->previous())
            ->with([
                'flash_message' => 'Вы успешно восстановили раздел '. $category->name,
                'flash_message_status' => 'success',
            ]);
    }
}
