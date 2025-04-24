<?php

namespace App\Http\Controllers\sysadmin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\Hash;
use App\Models\Menu;

class menus extends Controller
{
    public function index()
	{
        $menulist = Menu::all();
        $menuform = Menu::where('type', 'menu')->get();

		return view('sysadmin/menus',compact('menulist','menuform'));
	}

    public function add(Request $request)
    {
        // Validasi input
        $request->validate([
            'frm_name'   => 'required|string|max:255',
            'frm_route'  => 'nullable|max:255',
            'frm_icon'   => 'nullable|string|max:100',
            'frm_type'   => 'nullable|string|max:100',
            'frm_parent' => 'nullable|numeric',
        ]);

        // Simpan data ke DB
        // Add Data
        Menu::create([
            'name' => $request->frm_name,
            'route' => $request->frm_route,
            'icon' => $request->frm_icon,
            'type' => $request->frm_type,
            'parent_id' => $request->frm_parent,
        ]);

        return redirect('/sysadmin/menus')->with('success', 'Menu successfully added');
    }

    public function delete($id)
    {
        // Cari user dan hapus
        $user = Menu::findOrFail($id);
        $user->delete();

        return redirect('/sysadmin/menus')->with('success', 'Menu successfully deleted');
    }

    public function update(Request $request)
    {
        // Validasi opsional: hanya jika password diisi
        $request->validate([
            'frme_name'   => 'required|string|max:255',
            'frme_route'  => 'nullable|max:255',
            'frme_icon'   => 'nullable|string|max:100',
            'frme_type'   => 'nullable|string|max:100',
            'frme_parent' => 'nullable|numeric',
        ]);
        
        // Update data
        Menu::where('id', $request->frme_id)->update([
            'name'      => $request->frme_name,
            'route'     => $request->frme_route,
            'icon'      => $request->frme_icon,
            'type'      => $request->frme_type,
            'parent_id' => $request->frme_parent,
        ]);
        

        return redirect('/sysadmin/menus')->with('success', 'Data successfully updated');
    }
}
