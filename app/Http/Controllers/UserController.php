<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return Inertia::render('User/User',['user'=>$user]);
    }

    public function create(Request $request){
        $user = new user();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = $request->post('password');
        $user->role_id = $request->post('role_id');
        $user->save();
    }
}
