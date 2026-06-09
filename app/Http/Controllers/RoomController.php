<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kosts;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;

        $room = Room::with('kosts')->paginate(5);

        return view("dashboard.dataKamar.indexKamar", [
            'name' => $name,
            'room' => $room
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;

        $kosts = Kosts::all();

        return view("dashboard.dataKamar.tambahDataKamar", [
            'name' => $name,
            'kosts' => $kosts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kost_id' => 'required|exists:tb_kosts,id',
            'nomor_kamar' => 'required|integer',
            'harga_bulanan' => 'required|integer',
            'status' => 'required'
        ]);

        try {
            DB::beginTransaction();

            Room::create($validateData);

            DB::commit();

            return redirect('/dashboard/kamar/data_kamar')->with('success', 'Berhasil menambahkan data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $name = Auth::user()->name;

        $kosts = Kosts::all();

        return view("dashboard.dataKamar.editDataKamar", [
            'name' => $name,
            'room' => $room,
            'kosts' => $kosts
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validateData = $request->validate([
            'kost_id' => 'required|exists:tb_kosts,id',
            'nomor_kamar' => 'required|integer',
            'harga_bulanan' => 'required|integer',
            'status' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $room->update($validateData);

            DB::commit();

            return redirect('/dashboard/kamar/data_kamar')->with('success', 'Berhasil mengubah data!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Error : ' . $e->getMessage());

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}
