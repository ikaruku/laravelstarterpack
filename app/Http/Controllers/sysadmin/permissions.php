<?php

namespace App\Http\Controllers\sysadmin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\Hash;

use App\Models\Permission;
use App\Models\User;
use App\Models\Menu;

class permissions extends Controller
{
    public function index()
	{
        $userlist = User::all();
        $permissionlist = Permission::all();

		return view('sysadmin/permissions',compact('userlist','permissionlist'));
	}

    public function detail($id)
    {
        $menulist = Menu::all()->sortBy('name');
        $selectedMenus = Permission::where('user_id', $id)->pluck('menu_id')->toArray();

        // Kirim data ke view
        return view('sysadmin/details', compact('menulist', 'selectedMenus'));
    }

    public function update(Request $request)
    {
        $userId = $request->user_id;
        $menus = $request->menus;
    
        $user = User::findOrFail($userId);
    
        // Hapus semua permission lama
        Permission::where('user_id', $userId)->delete();
    
        // Tambahkan permission baru
        if (!empty($menus)) {
            foreach ($menus as $menuId) {
                $menu = Menu::find($menuId);
    
                if ($menu) {
                    Permission::create([
                        'user_id'    => $userId,
                        'menu_id'    => $menu->id
                    ]);
                }
            }
        }
    
        return redirect('/sysadmin/permissions');
    }
}
