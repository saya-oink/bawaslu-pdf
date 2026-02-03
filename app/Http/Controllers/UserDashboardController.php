<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Ambil 4 berita terbaru yang statusnya published
        $news = News::where('status', 'published')
                    ->orderBy('published_at', 'desc')
                    ->limit(4)
                    ->get();

        return view('dashboard.user', compact('news'));
    }

    public function verifikasiDokumen()
    {
        // sementara masih dummy
        return view('user.verifikasi-dokumen');
    }
}
