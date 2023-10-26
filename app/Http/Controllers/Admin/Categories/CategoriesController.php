<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Website\Category;




class CategoriesController extends Controller
{
    public function index()
        {
            $categories = Categories::orderBy('id', 'desc')->paginate(12);
            return view('admin.categories.index', ['categories' => $categories]);
        }

    public function create()
        {
            return view('admin.categories.create');
        }


    public function store(Request $request)
        {
            $validatedData = $request->validate
            ([
                'categories_name'                            => 'required|string',
            ]);
            $categories = new Categories();
            $categories->categories_name                     = $validatedData['categories_name'];
            $categories->save();

            return redirect()->route('categories.index');
        }

    public function show($id)
        {
            $categories = categories::find($id);
            return view('admin.categories.edit' , compact('categories'));
        }

    public function edit($id)
        {
            $category = Categories::findOrFail($id);
            return view('admin.categories.edit', ['category' => $category]);
        }

    public function update(Request $request, $id)
        {
            $validatedData = $request->validate
            ([
                'categories_name'                   => 'required|string',
            ]);
            $Categories = Categories::find($id);
            $Categories->categories_name            = $validatedData['categories_name'];

            $Categories->save();
            return redirect()->route('categories.index');
        }

    public function delete($id)
        {
            $category = Categories::find($id);
            $category->delete();

            return redirect()->route('categories.index');
        }
}
