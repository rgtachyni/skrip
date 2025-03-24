<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Kontak;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function wisata()
    {
        $data = Wisata::all();
        // dd($data);

        return view('app.wisata.index', compact('data'));
    }

    public function detail_wisata($id)
    {
        $data = Wisata::find($id);
        $kategori = Kategori::all();
        $komentar = Komentar::where('wisata_id', $id)->get();
        $kontak = Kontak::find(1);

        // dd($data);

        return view('app.wisata.detail', compact('data', 'komentar', 'kategori', 'kontak'));
    }

    public function storeComment(Request $request, $id)
    {
        $wisata = Wisata::findOrFail($id);

        $komentar = new Komentar([
            'nama' => $request->nama,
            'isi' => $request->isi,
            'wisata_id' => $wisata->id,
        ]);

        // dd($komentar);

        $komentar->save();

        return redirect()->route('wisata.detail', ['id' => $wisata->id])
            ->with('success', 'Comment submitted successfully')
            ->with('komentar', $komentar);
    }
}
