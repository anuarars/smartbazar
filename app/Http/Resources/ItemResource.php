<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->product->title,
            'description' => $this->product->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'views' => $this->views,
            'price_after_discount' => $this->afterDiscount,
            'measure' => $this->product->measure->title,
            'image_url' => $this->product->galleries[0]->image
        ];
    }
}
