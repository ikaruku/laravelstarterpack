<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $dashboard = Menu::create([
            'name' => 'home',
            'route' => 'home',
            'type' => 'menu'
        ]);

        $userMenu = Menu::create([
            'name' => 'User Management',
            'route' => null,
            'type' => 'menu'
        ]);

        Menu::create([
            'name' => 'User List',
            'route' => 'users.index',
            'type' => 'menu',
            'parent_id' => $userMenu->id
        ]);

        Menu::create([
            'name' => 'Create User',
            'route' => 'users.create',
            'type' => 'action',
            'parent_id' => $userMenu->id
        ]);
    }
}

