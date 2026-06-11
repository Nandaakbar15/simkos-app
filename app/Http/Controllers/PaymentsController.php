<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Rentals;
use App\Models\Bills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Storage;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $name = Auth::user()->name;
        $payments = Payments::with(['bills.rentals.tenants', 'bills.rentals.room'])->paginate(5);

        return view("dashboard.dataPembayaran.indexDataPembayaran", [
            'name' => $name,
            'payments' => $payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $name = Auth::user()->name;
        // Load bills yang belum lunas beserta relasi untuk ditampilkan di dropdown
        // Hanya menampilkan tagihan dengan status 'belum_bayar' atau 'terlambat'
        $bills = Bills::with(['rentals.tenants', 'rentals.room'])
            ->whereIn('status', ['belum_bayar', 'terlambat'])
            ->get();

        return view("dashboard.dataPembayaran.tambahDataPembayaran", [
            'name' => $name,
            'bills' => $bills
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'bill_id' => 'required|exists:tb_bills,id',
            'tgl_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|in:cash,transfer,qris',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'catatan' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            // Cast to proper type
            $validateData['jumlah_bayar'] = (float) $validateData['jumlah_bayar'];

            if($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');
                $validateData['bukti_pembayaran'] = '/storage/' . $path;
            }

            Payments::create($validateData);

            DB::commit();

            return redirect('/dashboard/pembayaran/data_pembayaran')->with('success', 'Berhasil menambahkan data pembayaran!');

        } catch(Exception $e) {
            DB::rollBack();

            Log::error('Payments Create Error : ' . $e->getMessage(), [
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
    public function edit(Payments $payments)
    {
        $name = Auth::user()->name;
        // Hanya menampilkan tagihan dengan status 'belum_bayar' atau 'terlambat'
        $bills = Bills::with(['rentals.tenants', 'rentals.room'])
            ->whereIn('status', ['belum_bayar', 'terlambat'])
            ->get();

        return view("dashboard.dataPembayaran.editDataPembayaran", [
            'name' => $name,
            'bills' => $bills,
            'payments' => $payments
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payments $payments)
    {
        $validateData = $request->validate([
            'bill_id' => 'required|exists:tb_bills,id',
            'tgl_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|in:cash,transfer,qris',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'catatan' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            if($request->hasFile('bukti_pembayaran')) {

                if($request->fotoLama) {
                    Storage::disk('public')->delete($request->fotoLama);
                }

                $file = $request->file('bukti_pembayaran');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');
                $validateData['bukti_pembayaran'] = '/storage/' . $path;
            }

            $payments->update($validateData);

            DB::commit();

            return redirect('/dashboard/pembayaran/data_pembayaran')->with('success', 'Berhasil mengubah data!');

        } catch(Exception $e) {
            DB::rollback();

            Log::error('Payments Create Error : ' . $e->getMessage(), [
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
    public function destroy(Payments $payments)
    {
        $payments->delete();

        return redirect('/dashboard/pembayaran/dataPembayaran')->with('success', 'Berhasil menghapus data!');
    }
}
