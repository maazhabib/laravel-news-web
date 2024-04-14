<?php

namespace App\Http\Controllers\Website;

use App\Models\post;
use App\Models\categories;
use App\Http\Controllers\Controller;
//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class WebsiteController extends Controller
{

    public $pagination = 4;

    public function index(Request $request)
    {
        $data['posts']          = Post::orderBy('id', 'desc')->search($request)->paginate($this->pagination);
        $data['categories']     = categories::all();

        $data['sidebar'] =  Post::orderBy('created_at', 'desc')->take(3)->get();

        return view('website.pages.index', $data);

    }

    public function show($id)
    {
        $id                 = decrypt($id);
        $post               = Post::find($id);
        $categories         = categories::all();
        $Sidebar            = Post::orderBy('post_date', 'desc')->take(3)->get();

        return view('website.pages.single', compact('post', 'categories', 'Sidebar'));
    }
}
