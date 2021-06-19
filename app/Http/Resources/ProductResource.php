<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'uuid' => $this->uuid,
            'company' => $this->company_id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'url' => $this->url,
            'image' => url("/storage/{$this->image}"),
            'created_at' => Carbon::parse($this->created_at)->format("d/m/Y"),
            'updated_at' => Carbon::parse($this->updated_at)->format("d/m/Y"),
        ];
    }
}
