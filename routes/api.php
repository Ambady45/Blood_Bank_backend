
<?php
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;
use app\http\middleware\RoleMiddleware;
use App\Http\Controllers\API\BloodBagController;
use App\Http\Controllers\API\BloodBankController;
use App\Http\Controllers\API\RefrigeratorsController;   
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\TemperatureController;
use App\Http\Controllers\API\TemperatureLogController;

//login and logout routes
Route::post('/login', [  AuthController::class,  'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//admin and staff authorization routes
Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::get('/admin-dashboard',function(){
         return response()->json(['message'=>'Admin only']);
    });
});
Route::middleware(['auth:sanctum','role:staff'])->group(function(){
    Route::get('/blood-bags',function(){
         return response()->json(['message'=>'Staff only']);
    });
});

//BloodBag CRUD routes for admin and staff
Route::middleware(['auth:sanctum', 'role:admin,staff'])->group(function () {
    Route::apiResource('blood-bags', BloodBagController::class);
});

//BloodBank CRUD routes for admin only
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::apiResource('blood-banks', BloodBankController::class);
});

//Refrigerator and TemperatureLog CRUD routes for admin and staff
Route::middleware(['auth:sanctum', 'role:admin,staff'])->group(function () {
    Route::apiResource('refrigerators', RefrigeratorsController::class);
});

//temperature logs for admin and staff
Route::middleware(['auth:sanctum', 'role:admin,staff'])->group(function () {
    Route::apiResource('temperature-logs', TemperatureLogController::class);
});



//Dashboard routes for admin and staff for statistics and insights
Route::get('/dashboard/total-bags', [DashboardController::class, 'totalBags']);
Route::get('/dashboard/available-bags', [DashboardController::class, 'availableBags']);
Route::get('/dashboard/expired-bags', [DashboardController::class, 'expiredBags']);
Route::get('/dashboard/critical-temperature-alerts', [DashboardController::class, 'criticalTemperatureAlerts']);
Route::get('/dashboard/average-temperature-today', [DashboardController::class, 'averageTemperatureToday']);
Route::get('/dashboard/refrigerator-health-scores', [DashboardController::class, 'refrigeratorHealthScores']);

//Temperature analysis route 
Route::get('temperature/{id}', [TemperatureController::class, 'show']);

//expiring and expired blood bags routes
Route::get('expiring-bloodbags', [BloodBagController::class, 'expiring']);
Route::get('expired-bloodbags', [BloodBagController::class, 'expired']);
