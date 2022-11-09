<?php

namespace App\Services;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class PropertyService
{
    protected int $current_page;
    protected int $last_page;
    protected Collection $properties;
    protected Collection $property_types;

    public function __construct()
    {
        $this->properties = collect();
        $this->current_page = 1;
        $this->last_page = 1;
        $this->property_types = PropertyType::all();
    }

    public function makeRequest(): Collection
    {
        while($this->current_page <= $this->last_page) {
            $request = Http::get(config('property.api_url')."&page[number]=$this->current_page")->collect();
            $this->last_page = $request['last_page'];
            $this->current_page++;

            foreach ($request['data'] as $property) {
                if (!$this->property_types->contains('title', $property['property_type']['title'])) {
                    $property_type = PropertyType::create([
                        'title' => $property['property_type']['title'],
                        'description' => $property['property_type']['description']
                    ]);
                    $this->property_types->push($property_type);
                }

                Property::updateOrCreate(
                    ['latitude' => $property['latitude'], 'longitude' => $property['longitude']],
                    [
                        'county' => $property['county'],
                        'country' => $property['country'],
                        'town' => $property['town'],
                        'description' => $property['description'],
                        'address' => $property['address'],
                        'image_full' => $property['image_full'],
                        'image_thumbnail' => $property['image_thumbnail'],
                        'num_bedrooms' => $property['num_bedrooms'],
                        'num_bathrooms' => $property['num_bathrooms'],
                        'price' => $property['price'],
                        'type' => $property['type'],
                        'property_type_id' => $this->property_types
                            ->where('title', $property['property_type']['title'])
                            ->first()
                            ->id,
                    ]
                );
            }
        }

        return $this->properties;
    }
}
