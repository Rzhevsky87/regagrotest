<?php

namespace App\Http\Resources\Locations;

use Illuminate\Http\Resources\Json\ResourceCollection; //ResourceCollection
// use Illuminate\Http\Resources\Json\JsonResource; // JsonResource
// use App\Locations\Location;

class LocationsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'latitude' => $this->latitude,
        //     'longitude' => $this->longitude,
        //     'population_count' => $this->population_count,
        //     'created_at' => $this->created_at
        // ];

        return [
            'locations' => $this->collection,
        ];
    }
}
