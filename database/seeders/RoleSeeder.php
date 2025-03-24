<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ['role' => 'U', 'role_name' => 'User'],
            ['role' => 'A', 'role_name' => 'Admin'],
            ['role' => 'SU', 'role_name' => 'SuperAdmin'],
        ];

        foreach ($role as $key => $v) {
            Role::create([
                'role' => $v['role'],
                'name' => $v['role_name'],
            ]);
        };

        // $lowongan = [
        //     [
        //         'nama' => 'Backend Engineer',
        //         'deskripsi' => 'Are you someone whos passionate about coding and possesses a knack for constructing resilient backend systems? Verihubs is on the lookout for a talented Backend Engineer to become a key player in our team, contributing significantly to the refinement and optimization of our technological infrastructure',
        //         'tanggal_mulai' => '2024-05-01',
        //         'tanggal_selesai' => '2024-05-03',
        //         'tgl_pengumuman_seleksi' => '2024-05-05',
        //         'tgl_pengumuman_lulus' => '2024-05-10',
        //         'gambar' => '20240328_6605d68c9f417.png',
        //         'persyaratan' => 'Bachelor’s Degree in Computer Science with 1-3 years of experience as Backend Engineer.
        //         Proficient in developing backend services using Python or Typescript.
        //         Proficient in making unit tests, integration tests, and end to end testing.
        //         Proficient in creating SQL database schema, writing SQL query, and interfacing SQL database with backend service.
        //         Able to communicate clearly and collaborate effectively with different teams.',
        //         'batas_usia' => '27',
        //         'status' => '1',
        //         'provinsi_id' => '320000',
        //         'kabupaten_id' => '320500',
        //         'kecamatan_id' => '320524',
        //         'kelurahan_id' => '320524AE',
        //     ],
        // ];

        // foreach ($lowongan as $key => $v) {
        //     Lowongan::create([
        //         'nama' => $v['nama'],
        //         'deskripsi' => $v['deskripsi'],
        //         'tanggal_mulai' => $v['tanggal_mulai'],
        //         'tanggal_selesai' => $v['tanggal_selesai'],
        //         'tgl_pengumuman_seleksi' => $v['tgl_pengumuman_seleksi'],
        //         'tgl_pengumuman_lulus' => $v['tgl_pengumuman_lulus'],
        //         'gambar' => $v['gambar'],
        //         'persyaratan' => $v['persyaratan'],
        //         'batas_usia' => $v['batas_usia'],
        //         'status' => $v['status'],
        //         'provinsi_id' => $v['provinsi_id'],
        //         'kabupaten_id' => $v['kabupaten_id'],
        //         'kecamatan_id' => $v['kecamatan_id'],
        //         'kelurahan_id' => $v['kelurahan_id'],
        //     ]);
        // };

        // $regional = [
        //     ['name' => 'DPS JATIM SURABAYA'],
        //     ['name' => 'DPS JATIM MALANG'],
        //     ['name' => 'DPS SULSEL MAKASSAR'],
        //     ['name' => 'DPS SULSEL GOWA'],
        // ];

        // foreach ($regional as $key => $v) {
        //     Regional::create([
        //         'name' => $v['name'],
        //     ]);
        // };
    }
}
