<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Selling;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();

    $data = [
        'count' => [
            'users' => User::count(),
            'contents' => Content::count(),
            'sales' => Selling::count(),
        ],
        'updated' => [
            'users' => User::latest()->first(),
            'contents' => Content::latest()->first(),
            'sales' => Selling::latest()->first(),
        ],
    ];

    // Tambahkan ini hanya untuk admin
    if ($user->role === 'admin') {
        $sevenDays = now()->subDays(6)->startOfDay();
        $sales = Selling::where('created_at', '>=', $sevenDays)->get();

        $chartLabels = [];
        $chartData = [];

        for ($i = 0; $i < 7; $i++) {
            $date = now()->subDays(6 - $i)->format('Y-m-d');
            $chartLabels[] = $date;
            $chartData[] = $sales->whereBetween('created_at', [
                now()->subDays(6 - $i)->startOfDay(),
                now()->subDays(6 - $i)->endOfDay(),
            ])->count();
        }

        $data['chartLabels'] = $chartLabels;
        $data['chartData'] = $chartData;
    }

    return view('dashboard', $data);
}


}



