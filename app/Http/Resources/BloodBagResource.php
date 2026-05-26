<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BloodBagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
          return [
            'id' => $this->id,
            'bag_number' => $this->bag_number,
            'blood_group' => $this->blood_group,
            'donor_name' => $this->donor_name,
            'status' => ucfirst($this->status),
            'quantity_ml' => $this->quantity_ml,
            'expiry_date' => $this->expiry_date,
            'refrigerator' => $this->whenLoaded('refrigerator')
        ];
    }
}
