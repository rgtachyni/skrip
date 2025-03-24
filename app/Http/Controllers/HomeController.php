<?php

namespace App\Http\Controllers;

use App\Http\Services\Repositories\Contracts\LowonganContract;
use App\Http\Services\Repositories\Contracts\PelamarContract;
use App\Models\Wilayah;
use App\Traits\Uploadable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Uploadable;
    protected $foto_path = 'uploads/pelamar/foto';
    protected $berkas_path = 'uploads/pelamar/berkas';

    protected $lowongan, $title, $response, $pelamar;

    public function __construct(LowonganContract $lowongan, PelamarContract $pelamar)
    {
        $this->lowongan = $lowongan;
        $this->pelamar = $pelamar;
    }

    public function index(Request $r)
    {
        return view('apps.home');
    }

    public function indexData(Request $r)
    {
        $title = $this->title;
        $data = $this->lowongan->lowonganAktif($r->all());
        $perPage = $r->jml == '' ? 6 : $r->jml;
        $view = view('apps.dataHome', compact('data', 'title'))->with('i', ($r->input('page', 1) -
            1) * $perPage)->render();
        return response()->json([
            "total_page" => $data->lastpage(),
            "total_data" => $data->total(),
            "html"       => $view,
        ]);
    }

    public function getWilayah($id)
    {
        $data = Wilayah::where('id_wilayah', $id)->orderBy('nama', 'asc')->get();
        return response()->json($data);
    }

    public function message()
    {
        return view('apps.message');
    }
}
