<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
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
            'name' =>$this->name,
            'description' =>$this->details,
            'price' =>$this->price,
            'discount' =>$this->discount,
            'rating' =>round($this->reviews->sum('star')/$this->reviews->count()),
            'href' =>[
                'reviews' =>route('Reviews.index', $this->id)
            ],
        ];
    }
}
