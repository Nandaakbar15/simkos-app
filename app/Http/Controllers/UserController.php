<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $users = User::paginate(5);

        return view('dashboard.dataUser.indexUser', [
            'users' => $users,
            'name' => $name
        ]);
    }
}
