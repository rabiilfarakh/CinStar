<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        return view('auth.role');
    }

    public function role(request $request) {

        $userId = session::get('user_role');
        $role = $request->role;

        User::where('id', $userId)->update(['role' => $role]);


        return redirect()->route('login');

    }   
}
