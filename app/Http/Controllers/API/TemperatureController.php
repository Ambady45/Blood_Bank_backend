<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\services\TemperatureService;

class TemperatureController extends Controller
{
     protected $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    public function show($id)
    {
        return response()->json(
            $this->service->calculate($id)
        );
    }
}
