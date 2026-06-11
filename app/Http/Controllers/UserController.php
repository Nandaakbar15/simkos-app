<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    public function create()
    {
        $name = Auth::user()->name;

        return view("dashboard.dataUser.tambahDataUserOwner", [
            'name' => $name
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string'
        ]);

        try {
            DB::beginTransaction();

            $validateData['password'] = bcrypt($validateData['password']);
            $validateData['role'] = 'owner';

            User::create($validateData);

            DB::commit();

            return redirect('/dashboard/user/data_user')->with('success', 'Berhasil menambahkan data user!');

        } catch(Exception $e) {
            DB::rollBack();

            Log::error('User Owner Create Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem! ' . $e->getMessage());
        }
    }
}
