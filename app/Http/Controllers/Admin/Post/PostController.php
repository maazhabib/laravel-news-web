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
            $post = post::orderBy('id', 'desc', categories::all())->paginate(12);
            return view('admin.posts.index', ['post' => $post ]);

        }

    public function create()
        {
            return view('admin.posts.create')->with('categories', categories::all());
        }

    public function store(Request $request)
        {
            $validatedData = $request->validate
            ([
                'title'                           => 'required|string',
                'description'                     => 'required|string',
                'categories_id'                   => 'required|exists:App\Models\Categories,id',
                'images'                           => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $post = new post();
            $post->title                           = $validatedData['title'];
            $post->description                     = $validatedData['description'];
            $post->categories_id                   = $validatedData['categories_id'];
            $post->image                           = $imageName;
            $post->save();

            return redirect()->route('post.index');
        }

    public function show($id)
        {

        }

    public function edit($id)
        {
            $post = post::find($id);
            return view('admin.posts.edit' , compact('post'))->with('categories', categories::all());
        }

    public function update(Request $request, $id)
        {
            $validatedData = $request->validate
            ([
                'title'                           => 'required|string',
                'description'                     => 'required|string',
                'categories_id'                   => 'required|exists:App\Models\Categories,id',
                'images'                           => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $post = Post::find($id);
            $post->title                           = $validatedData['title'];
            $post->description                     = $validatedData['description'];
            $post->categories_id                   = $validatedData['categories_id'];
            $post->image                           = $imageName;

            $post->save();
            return redirect()->route('post.index');
        }

    public function delete($id)
        {
            $post =Post::where('id',$id)->first();
            $post->delete();

            return redirect()->route('post.index');
        }
}
