<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $table = 'trash';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
