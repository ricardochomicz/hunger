<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'plan_id' => $this->plan_id,
            'uuid' => $this->uuid,
            'cnpj' => $this->cnpj,
            'name' => $this->name,
            'email' => $this->email,
            'url' => $this->url,
            'logo' => $this->logo ? url("storage/{$this->logo}") : null,
            'active' => $this->active,
            'subscription' => Carbon::parse($this->subscription)->format("d/m/Y"),
            'expires_at' => $this->expires_at,
            'subscription_id' => $this->subscription_id,
            'subscription_active' => $this->subscription_active,
            'subscription_suspended' => $this->subscription_suspended,
            'created_at' => Carbon::parse($this->created_at)->format("d/m/Y"),
            'updated_at' => Carbon::parse($this->updated_at)->format("d/m/Y"),
        ];
    }
}
