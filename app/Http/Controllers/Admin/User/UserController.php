<?php

namespace App\Http\Controllers\admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index()
    {
        $pagination = User::orderBy('id', 'desc')->paginate(15);
        return view('Admin.User.index')->with('Users', $pagination);

    }


    public function create()
    {
        return view('Admin.User.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate
        ([
            'name'       => 'required|string',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string',
            'role'       => 'required|in:user,admin',
        ]);

        $user = new User();
        $user->name         = $validatedData['name'];
        $user->email        = $validatedData['email'];
        $user->password     = bcrypt($validatedData['password']);
        $user->role         = $validatedData['role'];
        $user->save();
        return redirect()->route('user.index');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('Admin.User.edit' , compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.User.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate
        ([
            'name'          => 'required|string',
            'email'         => 'required|email',
            'password'      => 'nullable|string|min:6',
            'role'          => 'required|in:user,admin',
        ]);
        $user = User::find($id);
        $user->name         = $validatedData['name'];
        $user->email        = $validatedData['email'];
        $user->role         = $validatedData['role'];
        $user->password     = bcrypt($validatedData['password']);

        $user->save();
        return redirect()->route('user.index');
    }


    public function delete($id)
    {
        $User = User::find($id);
        $User->delete();
        return redirect()->route('user.index');
    }

}
