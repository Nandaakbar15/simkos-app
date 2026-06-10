<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Rentals;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $bills = Bills::with(['rentals.tenants', 'rentals.room'])->paginate(5);

        return view("dashboard.dataTagihan.indexDataTagihan", [
            'name' => $name,
            'bills' => $bills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        $rentals = Rentals::with([
            'tenants',
            'room'
        ])->get();

        return view("dashboard.dataTagihan.tambahDataTagihan", [
            'name' => $name,
            'rentals' => $rentals
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'rental_id' => 'required|exists:tb_rentals,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|digits:4',
            'nominal' => 'required|numeric|min:0',
            'jatuh_tempo' => 'required|date',
            'status' => 'required|in:belum_bayar,lunas,terlambat'
        ]);

        try {
            DB::beginTransaction();

            // Cast to proper types
            $validateData['bulan'] = (int) $validateData['bulan'];
            $validateData['tahun'] = (int) $validateData['tahun'];
            $validateData['nominal'] = (float) $validateData['nominal'];

            Bills::create($validateData);

            DB::commit();

            return redirect('/dashboard/tagihan/data_tagihan')->with('success', 'Berhasil menambahkan data tagihan!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Bills Create Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem! ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bills $bills)
    {
        $name = Auth::user()->name;
        $rentals = Rentals::with(['tenants', 'room'])->get();

        return view("dashboard.dataTagihan.editDataTagihan", [
            'name' => $name,
            'rentals' => $rentals,
            'bills' => $bills
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bills $bills)
    {
        $validateData = $request->validate([
            'rental_id' => 'required|exists:tb_rentals,id',
            'bulan' => 'required|integer|min:1|max:12',
            'tahun' => 'required|integer|digits:4',
            'nominal' => 'required|numeric|min:0',
            'jatuh_tempo' => 'required|date',
            'status' => 'required|in:belum_bayar,lunas,terlambat'
        ]);

        try {
            DB::beginTransaction();

            // Cast to proper types
            $validateData['bulan'] = (int) $validateData['bulan'];
            $validateData['tahun'] = (int) $validateData['tahun'];
            $validateData['nominal'] = (float) $validateData['nominal'];

            $bills->update($validateData);

            DB::commit();

            return redirect('/dashboard/tagihan/data_tagihan')->with('success', 'Berhasil menambahkan data tagihan!');
        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Bills Create Error : ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $validateData
            ]);

            return back()->withInput()->with('error', 'Error, terjadi kesalahan pada sistem! ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bills $bills)
    {
        $bills->delete();

        return redirect('/dashboard/tagihan/data_tagihan')->with('success', 'Berhasil menghapus data!');
    }
}
