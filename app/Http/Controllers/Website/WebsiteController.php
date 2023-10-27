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

<<<<<<< HEAD
        // Single page
=======

    public function sidebar()
    {
        $Posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('website.pages.sidebar', compact('Posts'));
    }




    public function store(Request $request)
        {
            //
        }


>>>>>>> 03ec7845ace75859c66183742404d4852c5e0573
        public function show($id)
        {
            $post = Post::find($id);
            $categories = categories::all();
            $Sidebar = Post::orderBy('post_date', 'desc')->take(3)->get();

            return view('website.pages.single', compact('post', 'categories' , 'Sidebar'));
        }
}
