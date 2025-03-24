<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\UserMenu;
use Illuminate\Database\Seeder;

class UserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Menu::all();
        foreach ($data as $v) {
            UserMenu::create([
                'role_id' => 2,
                'menu_id' => $v->id,
                'read' => 1,
                'create' => 1,
                'edit' => 1,
                'delete' => 1,
                'report' => 1,
            ]);
        };
    }
}
