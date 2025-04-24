<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use App\Models\Menu;

class SyncRoutesToMenu extends Command
{
    protected $signature = 'routes:sync-menu';
    protected $description = 'Sync named routes into the menus table';

    public function handle()
    {
        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $name = $route->getName();
            $uri = $route->uri();
            $method = implode('|', $route->methods());

            if ($name) {
                // Cek apakah sudah ada
                $menu = Menu::firstOrCreate(
                    ['route' => $name],
                    ['name' => ucfirst(str_replace('.', ' ', $name)), 'url' => '/' . $uri]
                );

                $this->info("Synced route: $name ($uri)");
            }
        }

        $this->info('All named routes synced to menus table.');
    }
}
