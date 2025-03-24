<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [

            ['name' => 'Data Master', 'icon' => ' bi-stack', 'url' => 'data-master', 'index' => 2, 'main_menu' => 'DATA MASTER'],
            ['name' => 'Wisata', 'icon' => ' bi-stack', 'url' => 'wisata', 'main_menu' => '', 'index' => 22],

            // ['name' => 'Report', 'icon' => ' bi-clipboard2-data-fill', 'url' => 'report', 'index' => 2, 'main_menu' => 'REPORT'],
            // ['name' => 'User', 'icon' => ' bi-stack', 'url' => 'report-user', 'index' => 21],

            // ['name' => 'Manajemen Web', 'icon' => ' bi-stack', 'url' => 'manajemen-web', 'index' => 3],
            // ['name' => 'Gallery Photo', 'icon' => ' bi-stack', 'url' => 'gallery-photos', 'index' => 35],

            ['name' => 'User Setting', 'icon' => ' bi-people-fill', 'url' => 'user-settings', 'index' => 4, 'main_menu' => 'USERS'],
            // ['name' => 'Role', 'icon' => ' bi-stack', 'url' => 'roles', 'index' => 41, 'main_menu' => ''],
            // ['name' => 'Menu', 'icon' => ' bi-stack', 'url' => 'menus', 'index' => 42, 'main_menu' => ''],
            // ['name' => 'User Menu', 'icon' => ' bi-stack', 'url' => 'user-menus', 'index' => 43, 'main_menu' => ''],
            ['name' => 'Kontak', 'icon' => ' bi-stack', 'url' => 'kontak', 'index' => 41, 'main_menu' => ''],
            ['name' => 'User', 'icon' => ' bi-stack', 'url' => 'users', 'index' => 43, 'main_menu' => ''],

        ];

        foreach ($menu as $key => $v) {
            $id = $key + 1;
            if ($v['index']  <= 10) {
                $parent = $id;
            } else {
                $parent = $parent;
            }
            Menu::create([
                'parent' => ($v['index'] <= 10 ? 0 : $parent),
                'name' => $v['name'],
                'icon' => $v['icon'],
                'url' => $v['url'],
                'index' => $v['index'],
                'main_menu' => $v['main_menu'],
            ]);
        };
    }
}
