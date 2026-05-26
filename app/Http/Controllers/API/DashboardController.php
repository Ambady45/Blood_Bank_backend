<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodBag;
use App\Models\BloodBank;
use App\Models\Refrigerator;   
use App\Models\TemperatureLog; 


class DashboardController extends Controller
{
     /*public function StockIndex()
    {
        //Total blood bags
       $totalBags = BloodBag::count();

       //Available stock by blood group
       $availableBags = BloodBag::where('status', 'available')->groupBy('blood_group')->select('blood_group', \DB::raw('count(*) as count'))->get();

        //Total expired bags
       $expiredBags = BloodBag::where('expiry_date', '<', now())->count();

       //Critical temperature alerts
       $criticalTemps = TemperatureLog::where('temperature', '>', 8)->count();

       //Average temperature for today
       $avgTemp = TemperatureLog::whereDate('logged_at', today())
                        ->avg('temperature');

      // Refrigerator health score
         $refrigerators = Refrigerator::with('temperatureLogs')->get();
         $healthScores = [];
         foreach ($refrigerators as $fridge) {
              $temps = $fridge->temperatureLogs->pluck('temperature');
              $healthScore = 100 - ($temps->filter(fn($t) => $t > 8)->count() * 10);
              $healthScores[] = [
                'refrigerator_id' => $fridge->id,
                'health_score' => max(0, $healthScore)
              ];
         }
         //Critical temperature alerts 
            $criticalTemps = TemperatureLog::where('temperature', '>', 8)->count(); 
    
         return response()->json([
              'total_bags' => $totalBags,
              'available_bags' => $availableBags,
              'expired_bags' => $expiredBags,
              'critical_temperature_alerts' => $criticalTemps,
              'average_temperature_today' => round($avgTemp, 2),
              'refrigerator_health_scores' => $healthScores

         ]);
    
    }*/
     public function totalBags()
    {
        return response()->json([
            'total_bags' => BloodBag::count()]);
    }

    public function availableBags()
    {
        $availableBags = BloodBag::where('status', 'available')
            ->select('blood_group', \DB::raw('COUNT(*) as count'))
            ->groupBy('blood_group')
            ->get();

        return response()->json([
            'available_bags' => $availableBags]);
    }

    public function expiredBags()
    {
        return response()->json([
            'expired_bags' => BloodBag::where('expiry_date', '<', now())->count()]);
    }

    public function criticalTemperatureAlerts()
    {
        return response()->json([
            'critical_temperature_alerts' => TemperatureLog::where('temperature', '>', 8)->count()]);
    }

    public function averageTemperatureToday()
    {
        $avgTemp = TemperatureLog::whereDate('logged_at', today())->avg('temperature');

        return response()->json([
            'average_temperature_today' => round($avgTemp, 2)]);
    }

    public function refrigeratorHealthScores()
    {
        $refrigerators = Refrigerator::with('temperatureLogs')->get();
        $healthScores = [];

        foreach ($refrigerators as $fridge) {
            $temps = $fridge->temperatureLogs->pluck('temperature');
            $healthScore = 100 - ($temps->filter(fn($t) => $t > 8)->count() * 10);
            $healthScores[] = [
                'refrigerator_id' => $fridge->id,
                'health_score' => max(0, $healthScore)];
        }

        return response()->json([
            'refrigerator_health_scores' => $healthScores
        ]);
    }
}
