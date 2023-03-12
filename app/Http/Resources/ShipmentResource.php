<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
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
            'weight' => $this->weight,
            'size' => $this->size,
            'relationships' => [
                'employee' => new UserResource($this->employee),
                'courier' => new CourierResource($this->courier),
                'shipping_option' => new CourierShippingOptionResource($this->shippingOption)
            ]
        ];
    }
}
