<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\UserMenu;

class Helper
{
    // public static function getRecentPost($limit)
    // {
    //     $data = Article::offset(0)->limit($limit)->orderBy('id', 'desc')->get();
    //     return $data ?? null;
    // }

    // public static function getDataLimit($limit, $param)
    // {
    //     $data = Article::where('sub_category', $param)->offset(0)->limit($limit)->get();
    //     return $data ?? null;
    // }

    // public static function getMostPopulerNew($limit)
    // {
    //     $data = Article::offset(0)->limit($limit)->orderBy('rating', 'desc')->get();
    //     return $data ?? null;
    // }

    // public static function getMostPopuler($limit, $param, $id)
    // {
    //     $data = Article::where('title', '<>', $id)->where('sub_category', $param)->offset(0)->limit($limit)->orderBy('rating', 'desc')->get();
    //     return $data ?? null;
    // }

    // public static function getRelated($limit, $param, $id)
    // {
    //     $data = Article::where('title', '<>', $id)->where('sub_category', $param)->offset(0)->limit($limit)->get();
    //     return $data ?? null;
    // }

    public static function title($value)
    {
        return Str::remove(' ', ucwords(Str::of($value)->replace('_', ' ')));
    }

    // get data icon
    public static function icon()
    {
        $data = [
            'flaticon-squares-1',
            'flaticon-technology',
            'flaticon-squares',
            'flaticon-menu-1',
            'flaticon-menu-2',
            'flaticon-settings-1',
            'flaticon-folder-1',
            'flaticon-folder-2',
            'flaticon-folder-3',
            'flaticon-users',
            'flaticon-users-1',
        ];
        return $data;
    }

    public static function menu()
    {
        Session::forget('menu');
        Session::forget('sub_menu');
        Session::forget('roles');

        $data = UserMenu::join('menus', 'menus.id', '=', 'user_menus.menu_id')
            ->select('menus.*', 'user_menus.read', 'user_menus.create', 'user_menus.read', 'user_menus.edit', 'user_menus.delete', 'user_menus.report')
            ->where('user_menus.role_id', auth()->user()->role_id)
            ->orderBy('menus.index', 'asc')->get();
        $main_menu = $data->where('main_menu', '<>', '')->toArray();
        $menu = $data->where('parent', 0)->where('read', '1')->toArray();

        $sub_menu = $data->where('parent', '<>', 0)->where('read', '1')->toArray();
        $data = $data->toArray();

        // create session role menu
        foreach ($data as $m) {
            $menuAll[$m['url']] = $m;
        }

        Session::put('main_menu', $main_menu);
        Session::put('menu', $menu);
        Session::put('sub_menu', $sub_menu);
        Session::put('roles', $menuAll);
    }

    // get head title tabel
    public static function head($param)
    {
        return ucwords(str_replace('-', ' ', $param));
    }

    // replace spasi
    public static function replace($param)
    {
        return str_replace(' ', '', $param);
    }

    // button create
    public static function btnCreate($roles)
    {
        $arr = Session::get('roles');
        // dd($arr);
        if ($arr[$roles]['create'] == '1') {
            return '<a onclick="createForm()" class="btn btn-primary">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Add New
                    </a>';
        }
    }

    // get data from tabel
    public static function btnAction($id, $roles)
    {
        $edit = null;
        $delete = null;
        $arr = Session::get('roles');
        if ($arr[$roles]['edit'] == '1') {
            $edit = '<a onclick="editForm(' . $id . ')" class="">
                        <button type="button" class="btn btn-icon btn-round btn-warning btn-sm">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
            </a> ';
        }
        if ($arr[$roles]['delete'] == '1') {
            $delete = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $id . '"
               title="Delete" class="deleteData">
                        <button type="button" class="btn btn-icon btn-round btn-danger btn-sm">
                            <i class="fa fa-trash-alt"></i>
                        </button>
            </a>';
        }
        return $edit . $delete;
    }

    // get cek menu
    public static function count_menu($param)
    {
        $data = DB::table('user_menus')->where('role_id', $param)->get();
        return isset($data) ? $data->count() : null;
    }

    // cek data menu role user
    public static function getData($param)
    {
        $data = DB::table($param)->get();
        return isset($data) ? $data : null;
    }

    public static function cek_cheked($role, $id_menu, $flag)
    {
        $data = DB::table('user_menus')->select($flag)->where('active', '1')->where('role_id', $role)
            ->where('menu_id', $id_menu)->first();
        if ($data) {
            $checked = $data->$flag == '1' ? 'checked="checked"' : null;
        }
        return isset($checked) ? $checked : null;
    }

    // get hari
    public static function getHari($hari)
    {
        switch ($hari) {
            case "Sun":
                $hari = "Minggu";
                break;
            case "Mon":
                $hari = "Senin";
                break;
            case "Tue":
                $hari = "Selasa";
                break;
            case "Wed":
                $hari = "Rabu";
                break;
            case "Thu":
                $hari = "Kamis";
                break;
            case "Fri":
                $hari = "Jumat";
                break;
            case "Sat":
                $hari = "Sabtu";
                break;
        }
        return isset($hari) ? $hari : null;
    }

    // format 17 Januari 2021
    public static function getDateIndo($tgl)
    {
        $tanggal = substr($tgl, 8, 2);
        $bulan = Helper::getBulan((int)substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        $tgl = $tanggal . " " . $bulan . " " . $tahun;
        if ($tgl != "--") {
            return $tanggal . " " . $bulan . " " . $tahun;
        }
    }

    // format Januari 17, 2021
    public static function getDateIndo2($tgl)
    {
        $tanggal = substr($tgl, 8, 2);
        $bulan = Helper::getBulan((int)substr($tgl, 5, 2));
        $tahun = substr($tgl, 0, 4);
        $tgl = $tanggal . " " . $bulan . " " . $tahun;
        if ($tgl != "--") {
            return $bulan . " " . $tanggal . ", " . $tahun;
        }
    }

    public static function getBulan($bln)
    {
        if ($bln == 1)
            return "Januari";
        elseif ($bln == 2)
            return "Februari";
        elseif ($bln == 3)
            return "Maret";
        elseif ($bln == 4)
            return "April";
        elseif ($bln == 5)
            return "Mei";
        elseif ($bln == 6)
            return "Juni";
        elseif ($bln == 7)
            return "Juli";
        elseif ($bln == 8)
            return "Agustus";
        elseif ($bln == 9)
            return "September";
        elseif ($bln == 10)
            return "Oktober";
        elseif ($bln == 11)
            return "November";
        elseif ($bln == 12)
            return "Desember";
    }

    public static function getOpt($code)
    {
        $data = Session::get('option');
        return isset($data) ? $data[$code] : null;
    }

    public static function getDesc($code, $val)
    {
        $data = Session::get('option');
        $data = $data[$code][$val];
        return isset($data) ? $data->description : null;
    }

    public static function sessionOpt()
    {
        $data = DB::table('options')->where('code', '0')->where('active', '1')->orderBy('index', 'asc')->get();
        $data = $data->toArray();
        // create session option
        foreach ($data as $m) {
            $opt = DB::table('options')->where('code', $m->value)->where('active', '1')->orderBy('index', 'asc')->get();
            foreach ($opt as  $v) {
                $optAll[$m->value][$v->value] = $v;
            }
        }
        Session::put('option', $optAll);
    }

    public static function arrayToString($param)
    {
        $data = null;
        foreach ($param as $v) {
            if ($data == null) {
                $data = $v;
            } else {
                $data = $data . "," . $v;
            }
        }
        return $data;
    }

    public static function sessionTag()
    {
        $tags = DB::table('tags')->get();
        foreach ($tags as  $v) {
            $tagAll[$v->id] = $v->name;
        }
        Session::put('tags', $tagAll);
    }

    public static function getTagName($param)
    {
        $tag_session = Session::get('tags');
        $data = null;
        $param = explode(',', $param);
        foreach ($param as $v) {
            if ($data == null) {
                $data = $tag_session[$v];
            } else {
                $data = $data . ", " . $tag_session[$v];
            }
        }
        return $data;
    }

    public static function getTagsName($id)
    {
        $tags = DB::table('tags')->find($id);
        return $tags->name ?? null;
    }

    public static function countCategory($id)
    {
        $count = DB::table('articles')->where('category_id', $id)->count();
        return $count ?? null;
    }

    public static function strReplace($title)
    {
        $title = str_replace('\'', '', $title);
        $title = str_replace(',', '', $title);
        $title = str_replace('.', '', $title);
        $title = str_replace(';', '', $title);
        $title = str_replace(':', '', $title);
        $title = str_replace('-', '', $title);
        $title = str_replace(')', '', $title);
        $title = str_replace('(', '', $title);
        $title = str_replace('?', '', $title);
        $title = str_replace(' ', '-', $title);
        $title = strtolower($title);
        return $title;
    }

    public static function getKabupaten($id)
    {
        $data = DB::table('wilayah')->where('id_wilayah', $id)->orderBy('nama', 'asc')->get();
        return isset($data) ? $data : null;
    }

    public static function getNamaWilayah($id)
    {
        $data = DB::table('wilayah')->where('kode_wilayah', $id)->orderBy('nama', 'asc')->first();
        return isset($data) ? $data->nama : null;
    }

    public static function getKontak($field)
    {
        $data = DB::table('kontak')->where('id', 1)->first();
        if (isset($data) && $field === 'no_hp') {
            $no_hp = $data->$field;
            if (substr($no_hp, 0, 1) === '0') {
                return substr($no_hp, 1);
            }
        }
        return isset($data) ? $data->$field : null;
    }

    public static function getKomentar($id)
    {
        $data = DB::table('komentar')->where('wisata_id', $id)->get();
        return isset($data) ? $data : null;
    }
}
