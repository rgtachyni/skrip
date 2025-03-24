<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function sejarah()
    {
        $data = Sejarah::all();
        // dd($data);

        return view('app.sejarah.index', compact('data'));
    }

    public function detail_sejarah($id)
    {
        $data = Sejarah::find($id);
        // dd($data);
        return view('app.sejarah.detail', compact('data'));
    }
}
