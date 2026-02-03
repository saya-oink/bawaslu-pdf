<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Imagick;
use App\Models\DocumentArchive;
use Illuminate\Support\Facades\Storage;

class WatermarkController extends Controller
{
    public function index() { return view('watermark'); }

    public function process(Request $request) 
    {
        ini_set('max_execution_time', 1800);
        ini_set('memory_limit', '2048M');

        $request->validate(['document' => 'required|mimes:pdf|max:51200']);
        $file = $request->file('document');
        $tempFolder = storage_path('app/public/temp_pdf_' . time());
        File::makeDirectory($tempFolder, 0777, true, true);

        try {
            $imagick = new \Imagick();
            // DPI 200: Cepat diproses namun tetap tajam untuk teks kecil
            $dpi = 200; 
            $imagick->setResolution($dpi, $dpi);
            $imagick->readImage($file->getPathname());
            
            $totalPage = $imagick->getNumberImages();
            $finalPdf = new Fpdi();
            $manager = new ImageManager(new \Intervention\Image\Drivers\Imagick\Driver());
            $fontPath = $this->getFontPath();

            // WARNA: Biru Navy Sangat Tua (#000080) agar terlihat formal
            $userColor = $request->wm_color ?? '#0b48a5';
            $rgbaColor = $this->hexToRgba($userColor, 0.85); 

            for ($i = 0; $i < $totalPage; $i++) {
                $imagick->setIteratorIndex($i);
                $imagick->setImageFormat('png');
                $imagePath = $tempFolder . "/page_{$i}.png";
                $imagick->writeImage($imagePath);

                $img = $manager->read($imagePath);

                // Watermark otomatis mulai halaman ke-2
                if ($i > 0) {
                    // UKURAN: Diperkecil (skala 18) agar tidak mengganggu isi dokumen
                    $fontSize = ($dpi / 150) * 18; 
                    $posY = $img->height() - 30; 
                    $posX_Left = 150;

                    // HAPUS DUPLIKASI TEKS & RGBA - PAKAI 1 WARNA SAJA
                        $warnaURL = $request->wm_color ?? '#0066cc';  // 1 variabel aja

                        // 1. TEKS URL
                        $img->text($request->text_left, $posX_Left, $posY, function($font) use ($warnaURL, $fontPath, $fontSize) {
                            $font->file($fontPath); 
                            $font->size($fontSize);
                            $font->color($warnaURL);  // HEX langsung
                        });

                        // 2. GARIS SAMA WARNA
                        $textWidth = strlen($request->text_left) * $fontSize * 0.4;
                        $img->drawLine(function ($draw) use ($posX_Left, $posY, $textWidth, $warnaURL) {
                            $draw->from($posX_Left, $posY + 8);
                            $draw->to($posX_Left + $textWidth, $posY + 8);
                            $draw->color($warnaURL);  // SAMA DENGAN TEKS!
                            $draw->width(1.5);
                        });

                                        // --- 3. CETAK TEKS KANAN (POJOK) ---
                    $textRightLength = strlen($request->text_right);
                    $estimatedTextWidth = $textRightLength * ($fontSize * 0.55); 
                    $posX_Right = $img->width() - $estimatedTextWidth - 150; 

                    $img->text($request->text_right, $posX_Right, $posY, function($font) use ($rgbaColor, $fontPath, $fontSize) {
                        $font->file($fontPath);
                        $font->size($fontSize);
                        $font->color($rgbaColor); 
                    });
                }

                $img->save($imagePath);

                $finalPdf->AddPage('P', 'A4');
                $finalPdf->Image($imagePath, 5, 5, 200, 285);
                
                if (File::exists($imagePath)) File::delete($imagePath);
            }

            $imagick->clear();
            $imagick->destroy();
            File::deleteDirectory($tempFolder);

            if (ob_get_level()) ob_end_clean();

            $archiveDir = 'private/archives/' . date('Y/m');
            $storedName = uniqid('locked_') . '.pdf';

            Storage::disk('local')->put(
            $archiveDir . '/' . $storedName,
            $finalPdf->Output('S')
                );

            DocumentArchive::create([
                'user_id'        => auth()->id(),
                'original_name'  => $file->getClientOriginalName(),
                'stored_name'    => $storedName,
                'stored_path'    => $archiveDir,
                'text_left'      => $request->text_left,
                'text_right'     => $request->text_right,
                'wm_color'       => $request->wm_color,
                'page_count'     => $totalPage,
                'file_size'      => strlen($finalPdf->Output('S')),
                'locked_at'      => now(),
            ]);


            return response()->streamDownload(function() use ($finalPdf) {
                echo $finalPdf->Output('S');
            }, 'Bawaslu_Link_Style_' . time() . '.pdf', [
                'Content-Type' => 'application/pdf',
                'Set-Cookie' => 'downloadStarted=true; Path=/'
            ]);

        } catch (\Exception $e) {
            if (File::exists($tempFolder)) File::deleteDirectory($tempFolder);
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
        
    }

    private function hexToRgba($hex, $alpha) {
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        return "rgba($r, $g, $b, $alpha)";
    }

    private function getFontPath() {
        $fontDir = public_path('fonts');
        $files = File::files($fontDir);
        foreach ($files as $file) {
            if (str_contains(strtolower($file->getFilename()), 'arial.ttf')) {
                return $file->getRealPath();
            }
        }
        throw new \Exception("Font Arial tidak ditemukan.");
    }
    
}

