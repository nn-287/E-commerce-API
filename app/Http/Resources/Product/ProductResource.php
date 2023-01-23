<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'name'=>$this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock == 0 ? 'Out of stock': $this->stock,
            'discount'=>$this->discount,
            'PriceAfterDiscount'=>round((1-($this->discount/100)) * $this->price,2),
            'rating'=>$this->review->count() > 0 ? round($this->review->sum('star')/$this->review->count(),2): 'No rating yet!',//How many stars as rating and dividing by the no of reviews so it will be from 1 to 5 stars
            'href'=>[

                'reviews'=>route('reviews.index',$this->id)
            ]

        ];
    }
}
