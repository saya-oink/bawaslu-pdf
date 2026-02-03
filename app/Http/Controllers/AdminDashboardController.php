<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DocumentArchive;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalDocuments = DocumentArchive::count();
        $todayDocuments = DocumentArchive::whereDate('created_at', today())->count();

        $dailyDocuments = DocumentArchive::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $chartLabels = [];
        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $chartLabels[] = Carbon::parse($date)->translatedFormat('d M');

            $found = $dailyDocuments->firstWhere('date', $date);
            $chartData[] = $found ? $found->total : 0;
        }

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalDocuments',
            'todayDocuments',
            'chartLabels',
            'chartData'
        ));
    }
}
