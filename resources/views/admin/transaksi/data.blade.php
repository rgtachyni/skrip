@foreach ($data as $key => $v)
    <tr>
        <td>{{ ++$i }}</td>
        <td>
            <div class="d-flex align-items-center">
                <div class="symbol symbol-50px me-3">
                    <img src="{{ asset('public/uploads/wisata/' . $v->gambar) }}" class="" alt="">
                </div>
            </div>
        </td>
        <td>{{ $v->nama_wisata }}</td>
        <td>{{ optional($v->kategori)->nama ?? 'Kategori tidak ditemukan' }}</td>
        <td>{{ $v->deskripsi }}</td>
        <td>
            {!! Helper::btnAction($v->id, $title) !!}
        </td>
    </tr>
@endforeach
