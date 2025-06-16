<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'menuDashboard' => 'active'
        ];
        return view('layout.dashboard', $data);
    }

    public function volumeChart(Request $request)
    {
        $date = $request->input('date');
        $now = Carbon::now()->toDateString();

        $query = DB::table('volume')
            ->selectRaw('HOUR(created_at) as hour, AVG(volume) as avg_volume');

        if ($date) {
            $query->whereDate('created_at', $date);
        } else {
            $query->whereDate('created_at', $now);
        }

        $data = $query->groupBy('hour')
            ->orderBy('hour')
            ->get();

        $result = array_fill(0, 24, 0); // default 0 untuk semua jam

        foreach ($data as $row) {
            $hour = str_pad($row->hour, 2, '0', STR_PAD_LEFT);
            $result[$hour] = round(($row->avg_volume / 30) * 100, 2);
        }

        return response()->json($result);
    }

    public function getCounts()
    {
        $now = Carbon::now()->toDateString();

        $opened = DB::table('open_and_close')->where('status', 1)->where('created_at', $now)->count();
        $closed = DB::table('open_and_close')->where('status', 0)->where('created_at', $now)->count();

        return response()->json([
            'opened' => $opened,
            'closed' => $closed,
        ]);
    }
}
