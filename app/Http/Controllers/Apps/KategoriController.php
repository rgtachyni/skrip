<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Kontak;
use App\Models\Wisata;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($id)
    {
        $data = Wisata::where('kategori_id', $id)->get();

        // dd($data);

        return view('app.kategori.index', compact('data'));
    }
}
