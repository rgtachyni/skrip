<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function galeri()
    {
        $data = Galeri::all();

        // dd($data);

        return view('app.galeri.index', compact('data'));
    }

    public function detail_galeri($id)
    {
        $data = Galeri::find($id);
        // dd($data);

        return view('app.galeri.detail', compact('data'));
    }
}
