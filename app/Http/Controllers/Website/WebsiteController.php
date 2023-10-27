<?php

namespace App\Http\Controllers\Website;

use App\Models\post;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WebsiteController extends Controller
{

    public function index()
    {
        $search = request()->query('search');

        if($search){
            $post = Post::where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc' )
                ->paginate(4);
        }else{
            $post = Post::orderBy('id', 'desc')->paginate(4);
        }
            $Sidebar = Post::orderBy('id', 'desc')->take(3)->get();

            return view('website.pages.index', compact('post' , 'search' , 'Sidebar'));
    }

        // Single page
        public function show($id)
        {
            $post = Post::find($id);
            $categories = categories::all();
            $Sidebar = Post::orderBy('post_date', 'desc')->take(3)->get();

            return view('website.pages.single', compact('post', 'categories' , 'Sidebar'));
        }
}
