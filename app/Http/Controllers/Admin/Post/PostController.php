<?php

namespace App\Http\Controllers\Admin\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\postsRequest;
use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{

    public $pagination = 10;

    public function index()
    {
        $data['posts'] = post::with('user', 'categories')
            ->orderBy('id' , 'desc')
            ->paginate($this->pagination);

        return view('admin.posts.index', $data);

    }

    public function create()
    {
        return view('admin.posts.create')->with('categories', categories::all());
    }

    public function arrayStore($request){
        return[
            'title'         => $request->title,
            'categories_id'      => $request->category,
            'description'   => $request->description,
            'author_id'     => Auth::user()->id,
        ];
    }

    public function store(postsRequest $request)
    {
        post::create($this->arrayStore($request));

        $count = categories::where('id', $request->category)->select('no_post')->first();
        categories::where('id', $request->category)->update(['no_post' => $count->no_post + 1]);

        return redirect()->route('post.index')->with('success' , 'Post create successfully');
    }


    public function edit($id)
    {
        $post = post::find($id);
        return view('admin.posts.edit', compact('post'))->with('categories', categories::all());
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate
        ([
            'title' => 'required|string',
            'description' => 'required|string',
            'categories_id' => 'required|exists:App\Models\Categories,id',
            'images' => 'nullable|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $post = Post::find($id);
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->categories_id = $validatedData['categories_id'];
        $post->image = $imageName;

        $post->save();
        return redirect()->route('post.index');
    }

    public function delete($id)
    {
        $post = Post::findorFail($id);

        $imagePath = public_path('images') . '/' . $post->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $post->delete();

        if (!empty($post->categories_id)){
            $count = categories::where('id', $post->categories_id)->select('no_post')->first();
            categories::where('id', $post->categories_id)->update(['no_post' => $count->no_post - 1]);
        }
        return redirect()->route('post.index');
    }

}
