<?php

namespace App\Http\Controllers\sysadmin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class users extends Controller
{
    public function index()
	{
        $userlist = User::all();
		return view('sysadmin/users',compact('userlist'));
	}

    public function add(Request $request)
    {
        // Validasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        
        // Add Data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect('/sysadmin/users')->with('success', 'User successfully added');
    }

    public function delete($id)
    {
        // Cari user dan hapus
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/sysadmin/users')->with('success', 'User successfully deleted');
    }

    public function update(Request $request)
    {
        // Validasi opsional: hanya jika password diisi
        $request->validate([
            'id' => 'required|exists:users,id',
            'frme_password' => 'required|string|min:8',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($request->id);

        // Update password
        $user->password = Hash::make($request->frme_password);
        $user->save();

        return redirect('/sysadmin/users')->with('success', 'Password successfully updated');
    }
}
