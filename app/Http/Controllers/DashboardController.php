<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'menuDashboard' => 'active'
        ];
        return view('layout.dashboard', $data);
    }
}
