<?php

namespace App\Http\Controllers\Admin\post;

use App\Http\Controllers\Controller;
use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function index()
        {
            $post = post::orderBy('id', 'desc')->paginate(12);
            return view('Admin.post.index', ['post' => $post]);
        }

    public function create()
        {
            return view('Admin.post.create')->with('categories', categories::all());

        }

    public function store(Request $request)
        {

            // dd($request );
            $validatedData = $request->validate
            ([
                'post_title'                            => 'required|string',
                'postdesc'                              => 'required|string',
                // 'category_name'                         => 'required|exists:App\Models\Categories,id',
                // 'image'                                 => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',

            ]);
            $categories = new post();
            $categories->title                     = $validatedData['post_title'];
            $categories->description                     = $validatedData['postdesc'];
            $categories->save();

            return redirect()->route('post.index');
        }

    public function show($id)
        {
            //
        }

    public function edit($id)
        {
            //
        }

    public function update(Request $request, $id)
        {
            //
        }

    public function destroy($id)
        {
            //
        }
}
