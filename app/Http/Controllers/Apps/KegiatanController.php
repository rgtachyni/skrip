<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Kegiatan;
use App\Models\Komentar;
use App\Models\Kontak;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function kegiatan()
    {
        $data = Kegiatan::all();

        return view('app.kegiatan.index', compact('data'));
    }

    public function detail_kegiatan($id)
    {
        $data = Kegiatan::find($id);
        return view('app.kegiatan.detail', compact('data'));
    }
}
