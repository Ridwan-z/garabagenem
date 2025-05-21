<?php

namespace App\Events;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;  // Pastikan untuk mengimpor log

class SensorDataReceived implements ShouldBroadcast
{
    public $data;

    public function __construct($data)
    {
        Log::info('Sensor Data Event: ', $data);
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return ['sensor-channel'];
    }

    public function broadcastAs()
    {
        return 'sensor-data';
    }
}
