<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'county' => ['required', 'string'],
            'country' => ['required', 'string'],
            'town' => ['required', 'string'],
            'postcode' => ['required', 'string'],
            'description' => ['required', 'string'],
            'address' => ['required', 'string'],
            'num_bedrooms' => ['required', 'integer'],
            'num_bathrooms' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'type' => ['required', 'string'],
            'property_type_id' => ['required', 'exists:property_types,id'],
            'image' => ['required', 'image']
        ];
    }
}
