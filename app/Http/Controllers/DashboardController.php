<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $name = Auth::user()->name;
        return view('dashboard.layouts.home', [
            'name' => $name
        ]);
    }
}
