@foreach ($data as $key => $v)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $v->name }}</td>
        <td>{{ $v->username }}</td>
        {{-- <td>{{ $v->email }}</td> --}}
        <td>{{ $v->role->name }}</td>
        <td>
            {!! Helper::btnAction($v->id, $title) !!}
        </td>
    </tr>
@endforeach
