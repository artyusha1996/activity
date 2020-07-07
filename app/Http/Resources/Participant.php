<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Participant
 * @package App\Http\Resources
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property Collection activities
 */
class Participant extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'activities' => $this->whenLoaded('activities', Activity::collection($this->activities)),
        ];
    }
}
