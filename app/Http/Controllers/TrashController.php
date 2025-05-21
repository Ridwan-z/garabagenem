<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrashController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'menuTrash' => 'active'
        ];

        $query = Trash::with('user');
        $search = $request->input('search');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('trash_id', 'like', "%$search%");
            });
        }

        $trash = $query->paginate(10)->appends(['search' => $search]);
        $user = User::get();
        return view('admin.trash.index', compact('trash', 'search', 'user') + $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trash_id' => 'required',
            'user_id' => 'required',
        ], [
            'trash_id.required' => 'Trash ID Tidak Boleh Kosong',
            'user_id.required' => 'Nama Pemilik Harus Dipilih',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $trash = new Trash;
        $trash->trash_id = $request->trash_id;
        $trash->user_id = $request->user_id;
        $trash->save();

        return response()->json([
            'message' => 'Data berhasil ditambahkan'
        ]);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'trash_id' => 'required',
            'user_id' => 'required',
        ], [
            'trash_id.required' => 'Trash ID Tidak Boleh Kosong',
            'user_id.required' => 'Nama Pemilik Harus Dipilih',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $trash = Trash::findOrFail($id);
        $trash->trash_id = $request->trash_id;
        $trash->user_id = $request->user_id;
        $trash->save();

        return response()->json(['message' => 'Data berhasil diubah']);
    }

    public function destroy($id)
    {
        $trash = Trash::findOrFail($id);
        $trash->delete();

        return redirect()->route('trash')->with('success', 'Data Berhasil Di Hapus');
    }
}
