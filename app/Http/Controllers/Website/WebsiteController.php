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
            $post = post::orderBy('id', 'desc', categories::all())->paginate(12);
            return view('website.pages.index', ['post' => $post ]);
        }


    public function create()
        {
            //
        }


    public function store(Request $request)
        {
            //
        }


    public function show($id)
        {
            $post = post::find($id);
            return view('website.pages.index' , compact('post'))->with('categories', categories::all());
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
