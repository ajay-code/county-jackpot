<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LotteryResource extends Resource
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
            'prize' => $this->prize,
            'entry_fee' => $this->entry_fee,
            'expire_at' => $this->expire_at->toW3cString(),
        ];
    }
}
