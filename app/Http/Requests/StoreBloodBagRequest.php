<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBloodBagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'refrigerator_id' => 'required|exists:refrigerators,id',
            'bag_number' => 'required|unique:blood_bags',
            'blood_group' => 'required',
            'donor_name' => 'required',
            'collection_date' => 'required|date',
            'expiry_date' => 'required|date|after:collection_date',
            'quantity_ml' => 'required|integer'];
    }
}
