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
                ->orderBy('id', 'desc')
                ->paginate(4);
        }else{
            $post = Post::orderBy('id', 'desc')->paginate(4);
            // post::orderBy('created_at', 'desc')->first();
        }

        return view('website.pages.index', compact('post' , 'search'));
    }


    public function sidebar()
    {
        $Posts = Post::orderBy('created_at', 'desc')->take(5)->get();
        return view('website.pages.sidebar', compact('Posts'));
    }




    public function store(Request $request)
        {
            //
        }


        public function show($id)
        {
            $post = Post::find($id);
            $categories = categories::all();

            return view('website.pages.single', compact('post', 'categories'));
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
