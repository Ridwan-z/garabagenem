<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'menuUser' => 'active'
        ];

        $query = User::query();
        $search = $request->input('search');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $users = $query->paginate(10)->appends(['search' => $search]);

        return view('admin.user.index', compact('users', 'search') + $data);
    }

    public function create()
    {
        $data = [
            'menuUser' => 'active'
        ];
        return view('admin.user.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'email.unique' => 'Email Sudah Ada',
            'password.min' => 'Password Minimal 8 Karakter',
            'password.confirmed' => 'Password Konfirmasi Tidak Sama',
        ]);

        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'menuUser' => 'active',
            'user' => User::findOrFail($id)
        ];
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'password' => 'nullable|confirmed'
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.unique' => 'Email Sudah Ada',
            'password.confirmed' => 'Password Konfirmasi Tidak Sama',
        ]);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data Berhasil Di Hapus');
    }
}
