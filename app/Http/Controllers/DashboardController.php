<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Rentals;
use App\Models\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home()
    {
        $name = Auth::user()->name;
        
        // Total Revenue (Total dari semua pembayaran)
        $totalRevenue = Payments::sum('jumlah_bayar') ?? 0;
        
        // Kamar Terisi (Count rentals dengan status 'aktif')
        $roomsOccupied = Rentals::where('status', 'aktif')->count();
        
        // Total Kamar
        $totalRooms = Room::count();
        
        // Kamar Kosong
        $roomsEmpty = $totalRooms - $roomsOccupied;
        
        // Pendapatan bulan ini
        $currentMonth = now()->month;
        $currentYear = now()->year;
        $monthlyRevenue = Payments::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('jumlah_bayar') ?? 0;
        
        // Hitung persentase perubahan bulan ini vs bulan lalu
        $lastMonth = now()->subMonth()->month;
        $lastYear = now()->subMonth()->year;
        $lastMonthRevenue = Payments::whereMonth('created_at', $lastMonth)
            ->whereYear('created_at', $lastYear)
            ->sum('jumlah_bayar') ?? 0;
        
        $revenuePercentage = $lastMonthRevenue > 0 
            ? (($monthlyRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100 
            : 0;
        
        return view('dashboard.layouts.home', [
            'name' => $name,
            'totalRevenue' => $totalRevenue,
            'roomsOccupied' => $roomsOccupied,
            'totalRooms' => $totalRooms,
            'roomsEmpty' => $roomsEmpty,
            'monthlyRevenue' => $monthlyRevenue,
            'revenuePercentage' => $revenuePercentage
        ]);
    }

    public function total_kamar()
    {
        return Room::count();
    }

    public function kamar_terisi()
    {
        return Rentals::where('status', 'aktif')->count();
    }

    public function pendapatan_bulan_ini()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;
        return Payments::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('jumlah_bayar') ?? 0;
    }
}
