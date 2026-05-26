<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BloodBag;
use App\Models\BloodBank;
use App\Models\AlertHistory;
use App\Models\Refrigerator; 
use carbon\Carbon; 
use App\Http\Requests\StoreBloodBagRequest;  
use App\Http\Resources\BloodBagResource;

class BloodBagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return BloodBagResource::collection(
        BloodBag::with('refrigerator')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBloodBagRequest $request)
    {
    return BloodBag::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bloodBag = BloodBag::find($id);
        if (!$bloodBag) {
            return response()->json(['message' => 'Blood bag not found'], 404);
        }
        return response()->json($bloodBag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bloodBag = BloodBag::find($id);
        if (!$bloodBag) {
            return response()->json(['message' => 'Blood bag not found'], 404);
        }
        $bloodBag->update($request->all());
        return response()->json($bloodBag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bloodBag = BloodBag::find($id);
        if (!$bloodBag) {
            return response()->json(['message' => 'Blood bag not found'], 404);
        }
        $bloodBag->delete();
        return response()->json(['message' => 'Blood bag deleted']);
    }

    public function expiring()
    {
        $data = BloodBag::whereDate('expiry_date', Carbon::tomorrow())->get();
        return response()->json($data);
    
    }
    public function expired()
    {
    $data = BloodBag::where('expiry_date', '<', now())->get();
    return response()->json($data);
    }
}
