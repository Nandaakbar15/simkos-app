<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use App\Models\Room;
use App\Models\Tenants;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rentals::with(['tenants', 'room'])->paginate(5);
        $name = Auth::user()->name;

        return view("dashboard.dataSewaKontrak.indexSewaKontrak", [
            'name' => $name,
            'rentals' => $rentals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $room = Room::all();
        $tenants = Tenants::all();

        return view("dashboard.dataSewaKontrak.tambahDataSewaKontrak", [
            'name' => $name,
            'room' => $room,
            'tenants' => $tenants
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'tenant_id' => 'required|exists:tb_tenants,id',
            'room_id' => 'required|exists:tb_room,id',
            'tgl_masuk' => 'required|date',
            'tgl_keluar' => 'required|date',
            'harga_sewa' => 'required|integer',
            'deposit' => 'required|integer'
        ]);

        try {
            DB::beginTransaction();

            Rentals::create($validateData);

            DB::commit();

            return redirect('/dashboard/sewa_kontrak/data_sewa_kontrak')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rentals $rentals)
    {
        $name = Auth::user()->name;
        $tenants = Tenants::all();
        $room = Room::all();

        return view("dashboard.dataSewaKontrak.editDataSewaKontrak", [
            'name' => $name,
            'rentals' => $rentals,
            'tenants' => $tenants,
            'room' => $room
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rentals $rentals)
    {
        $validateData = $request->validate([
            'tenant_id' => 'required|exists:tb_tenants,id',
            'room_id' => 'required|exists:tb_room,id',
            'tgl_masuk' => 'required|date',
            'tgl_keluar' => 'required|date',
            'harga_sewa' => 'required|integer',
            'deposit' => 'required|integer'
        ]);

        try {
            DB::beginTransaction();

            $rentals->update($validateData);

            DB::commit();

            return redirect('/dashboard/sewa_kontrak/data_sewa_kontrak')->with('success', 'Berhasil mengubah data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentals $rentals)
    {
        $rentals->delete();

        return redirect('/dashboard/sewa_kontrak/data_sewa_kontrak')->with('success', 'Berhasil menghapus data!');
    }
}
