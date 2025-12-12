<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->nip = $request->nip;
        $user->name = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->save();

        return redirect('/dashboard')->with('success', 'Data user berhasil diperbarui!');
    }
}
