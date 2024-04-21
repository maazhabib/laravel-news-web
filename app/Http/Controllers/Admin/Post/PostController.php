<?php

namespace App\Http\Controllers\Admin\post;

use App\Http\Controllers\Controller;
use App\Http\Requests\postsRequest;
use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public $pagination = 10;

    public function index()
    {
        $data['posts'] = post::orderBy('id', 'desc', categories::all())->paginate($this->pagination);
        return view('admin.posts.index', $data);

    }

    public function create()
    {
        return view('admin.posts.create')->with('categories', categories::all());
    }

    public function arrayStore($request){
        return[
            'title'         => $request->title,
            'category'      => $request->category,
            'description'   => $request->description,
        ];
    }

    public function store(postsRequest $request)
    {
//            $imageName = time().'.'.$request->image->extension();
//            $request->image->move(public_path('images'), $imageName);

//            $post = new post();
//            $post->title                           = $validatedData['title'];
//            $post->description                     = $validatedData['description'];
//            $post->categories_id                   = $validatedData['categories_id'];
////            $post->image                           = $imageName;
//            $post->post_date                       = date("Y-m-d");
//            $post->save();

//            $count = categories::where('id', $post->categories_id)->select('no_post')->first();
//            categories::where('id', $post->categories_id)->update(['no_post' => $count->no_post + 1]);

        return redirect()->route('post.index');
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
        $post = Post::find($id);

        $imagePath = public_path('images') . '/' . $post->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $post->delete();

        $count = categories::where('id', $post->categories_id)->select('no_post')->first();
        categories::where('id', $post->categories_id)->update(['no_post' => $count->no_post - 1]);

        return redirect()->route('post.index');
    }

}
