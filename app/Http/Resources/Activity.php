<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Activity
 * @package App\Http\Resources
 * @property integer $id
 * @property string $name
 * @property string starts_at
 * @property \App\Entities\City $city
 */
class Activity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'startsAt' => $this->starts_at,
            'city' => $this->whenLoaded('city', new City($this->city)),
        ];
    }
}
