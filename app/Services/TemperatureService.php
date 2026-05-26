<?php

namespace App\Services;
use App\Models\TemperatureLog;

class TemperatureService
{
    public function calculate($id)
    {
        $logs = TemperatureLog::where('refrigerator_id', $id)->get();
        $total = $logs->count();
        $unsafe = $logs->where('temperature', '>', 6)->count();

        return [
            'average_temperature' => $logs->avg('temperature'),
            'maximum_temperature' => $logs->max('temperature'),
            'minimum_temperature' => $logs->min('temperature'),
            'unsafe_minutes' => $unsafe,
            'risk_percentage(%)' => $total > 0 ? ($unsafe / $total) * 100 : 0
        ];
    }
}