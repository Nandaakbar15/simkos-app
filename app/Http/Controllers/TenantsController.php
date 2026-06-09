<?php

namespace App\Http\Controllers;

use App\Models\Tenants;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;

        $tenants = Tenants::paginate(5);

        return view("dashboard.dataPenyewa.indexPenyewa", [
            'name' => $name,
            'tenants' => $tenants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;

        return view("dashboard.dataPenyewa.tambahDataPenyewa", [
            'name' => $name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|string',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            DB::beginTransaction();

            if($request->has('foto_ktp')) {
                $file = $request->file('foto_ktp');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');
                $validateData['foto_ktp'] = '/storage/' . $path;
            }

            Tenants::create($validateData);

            DB::commit();

            return redirect('/dashboard/penyewa/data_penyewa')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenants $tenants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenants $tenants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenants $tenants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenants $tenants)
    {
        //
    }
}
