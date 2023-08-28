<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('auth.index',compact('users'));
    }
    
    public function create(){
        return view('auth.create');
    }

    public function store(Request $request){

        $user = User::create([
            'name' => $request->name,
            "email" =>  $request->email,
            "password"=> Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user){
        return view('auth.edit',compact('user'));
    }

    public function update(Request $request, User $user){
        $newUser = $user->findOrFail($user->id)->update([
            'name' => $request->name,
            "email" =>  $request->email,
            "password"=> Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user){
        $user->delete();
        return back();
    }
}
