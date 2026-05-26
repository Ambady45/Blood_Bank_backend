<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertHistory extends Model
{
    public function refrigerator()
{
    return $this->belongsTo(Refrigerator::class);
}
}
