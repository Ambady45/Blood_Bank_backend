<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Refrigerator;
class TemperatureLog extends Model
{
    protected $fillable = ['refrigerator_id','temperature','logged_at'];

    protected function casts(): array
    {
        return [
            'logged_at' => 'datetime'
        ];
    }

    public function refrigerator()
    {
        return $this->belongsTo( Refrigerator::class);
    }
}
