<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SensorDataReceived;
use Illuminate\Support\Facades\Log;  // Pastikan untuk mengimpor log

class SensorController extends Controller
{
    public function store(Request $request)
    {
        // Cek apakah ada data yang dikirimkan
        if ($request->isJson()) {
            $data = $request->all();

            // Log data yang diterima
            Log::info('Data Sensor diterima: ', $data);

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
