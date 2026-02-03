<?php

namespace App\Http\Controllers;

use App\Models\DocumentArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    /* =======================
     | INDEX
     =======================*/
    public function index()
{
    $archives = DocumentArchive::where('user_id', auth()->id())
        ->latest()
        ->paginate(10);

    if (auth()->user()->role === 'admin') {
        return view('admin.archives.index', compact('archives'));
    }

    return view('user.archives.index', compact('archives'));
}

    /* =======================
     | DOWNLOAD
     =======================*/
    public function download(DocumentArchive $archive)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $archive->user_id !== auth()->id()
        ) {
            abort(403);
        }

        $filePath = $archive->stored_path . '/' . $archive->stored_name;

        if (!Storage::disk('local')->exists($filePath)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('local')->download(
            $filePath,
            $archive->original_name
        );
    }

    /* =======================
     | PREVIEW
     =======================*/
    public function preview(DocumentArchive $archive)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $archive->user_id !== auth()->id()
        ) {
            abort(403);
        }

        $path = storage_path(
            'app/' . $archive->stored_path . '/' . $archive->stored_name
        );

        if (!is_file($path)) {
            abort(404, 'File PDF tidak ditemukan');
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$archive->original_name.'"',
        ]);
    }

    /* =======================
     | DELETE
     =======================*/
    public function destroy(DocumentArchive $archive)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $archive->user_id !== auth()->id()
        ) {
            abort(403);
        }

        $filePath = $archive->stored_path . '/' . $archive->stored_name;

        if (Storage::disk('local')->exists($filePath)) {
            Storage::disk('local')->delete($filePath);
        }

        $archive->delete();

        return back()->with('success', 'Arsip berhasil dihapus');
    }
}
