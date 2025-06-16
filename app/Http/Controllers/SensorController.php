<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SensorDataReceived;
use Illuminate\Support\Facades\Log;  // Pastikan untuk mengimpor log
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        // Cek apakah ada data yang dikirimkan
        if ($request->isJson()) {
            $data = $request->all();

            // Log data yang diterima
            Log::info('Data Sensor diterima: ', $data);

            if (isset($data['sensor'], $data['value'])) {
                $sensor = $data['sensor'];
                $value = $data['value'];

                if ($sensor === 'ir') {
                    // Simpan ke tabel open_and_close
                    DB::table('open_and_close')->insert([
                        'status' => (bool) $value,
                        'created_at' => Carbon::now()->toDateString(), // hanya tanggal
                    ]);
                } elseif ($sensor === 'ultrasonik') {
                    // Simpan ke tabel volume
                    DB::table('volume')->insert([
                        'volume' => $value,
                        'created_at' => Carbon::now(), // full timestamp
                    ]);
                }
            }

            // Broadcast tanpa menyimpan
            broadcast(new SensorDataReceived($data))->toOthers();

            return response()->json(['status' => 'ok']);
        } else {
            // Jika data yang diterima tidak valid (bukan JSON)
            Log::error('Data yang diterima tidak valid. Pastikan format data adalah JSON.');

            return response()->json(['status' => 'error', 'message' => 'Invalid data format'], 400);
        }
    }
}
