<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\Kontak;
use App\Models\Sejarah;
use App\Models\Wisata;

class HomeController extends Controller
{

    public function index()
    {
        $wisata = Wisata::all();
        $galeri = Galeri::all();
        $kegiatan = Kegiatan::all();

        return view('app/index', compact('wisata', 'galeri', 'kegiatan'));
    }
}
