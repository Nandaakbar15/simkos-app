<?php

namespace App\Http\Controllers;

use App\Models\Kosts;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class KostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;

        $kosts = Kosts::paginate(5);

        return view("dashboard.dataKosts.indexKosts", [
            'kosts' => $kosts,
            'name' => $name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;

        return view("dashboard.dataKosts.tambahDataKosts", [
            'name' => $name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kosts' => 'required|string',
            'alamat' => 'required|string',
            'jumlah_kamar' => 'required|integer|min:1'
        ]);

        $validateData['user_id'] = Auth::id();

        try {
            DB::beginTransaction();

            Kosts::create($validateData);

            DB::commit();

            return redirect('/dashboard/kosts/data_kosts')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kosts $kosts)
    {
        $name = Auth::user()->name;

        return view("dashboard.dataKosts.editDataKosts", [
            'name' => $name,
            'kosts' => $kosts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kosts $kosts)
    {
        $validateData = $request->validate([
            'nama_kosts' => 'required|string',
            'alamat' => 'required|string',
            'jumlah_kamar' => 'required|integer|min:1'
        ]);

        $validateData['user_id'] = Auth::id();

        try {
            DB::beginTransaction();

            $kosts->update($validateData);

            DB::commit();

            return redirect('/dashboard/kosts/data_kosts')->with('success', 'Berhasil mengubah data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kosts $kosts)
    {
        $kosts->delete();

        return redirect('/dashboard/kosts/data_kosts')->with('success', 'Berhasil menghapus data!');
    }
}
