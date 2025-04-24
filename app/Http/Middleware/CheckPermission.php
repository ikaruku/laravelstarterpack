<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Menu;
use App\Models\Permission;

class CheckPermission
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $routeName = $request->route()->getName();

        if ($user) {
            // Ambil menu_id dari permission user
            $menu_ids = Permission::where('user_id', $user->id)->pluck('menu_id');

            // Ambil data menu yang diizinkan
            $menus = Menu::whereIn('id', $menu_ids)->get();

            // Share ke view
            View::share('menus', $menus);

            // Cek apakah routeName termasuk dalam menu yang diizinkan
            $allowedRoutes = Menu::whereIn('id', $menu_ids)->pluck('route')->toArray();

            if (!in_array($routeName, $allowedRoutes)) {
                abort(403); // User tidak punya permission
            }
        }

        return $next($request);
    }
}
