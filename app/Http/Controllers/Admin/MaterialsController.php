<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Material;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\If_;

class MaterialsController extends Controller
{
    public function create($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.programs.categories.materials.create', compact('category'));
    }
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'doc' => 'required|mimes:pdf|max:20000'
        ]);

        $doc = $request->file('doc');

        $path = Storage::disk('public')->putFile('docs', new File($doc));

        $category = Category::where('id', $id)->first();

        if (!$category) {
            return redirect('admin/programs/')
                ->with([
                    'flash_message' => 'Такого раздела не существует!',
                    'flash_message_status' => 'danger',
                ]);
        }
        if ($path) {
            Material::create([
                'name' => $request->input('name'),
                'path' => $path,
                'category_id' => $category->id
            ]);
            return redirect('admin/categories/' . $category->id)
                ->with([
                    'flash_message' => 'Вы добавили учебный материал ' . $request->input('name'),
                    'flash_message_status' => 'success',
                ]);
        }
    }
    public function delete(Request $request, $id)
    {
        $material = Material::where('id', $id)->first();
        Material::where('id', $id)
            ->update([
                'is_hide' => true,
            ]);
        return redirect('admin/categories/'. $material->category->id)
            ->with([
                'flash_message' => 'Вы успешно удалили материал '. $material->name,
                'flash_message_status' => 'success',
            ]);
    }
    public function restore(Request $request, $id)
    {
        $material = Material::where('id', $id)->first();
        Material::where('id', $id)
            ->update([
                'is_hide' => false,
            ]);
        return redirect(url()->previous())
            ->with([
                'flash_message' => 'Вы успешно восстановили материал '. $material->name,
                'flash_message_status' => 'success',
            ]);
    }
}
