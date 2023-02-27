<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;


class DeviceShowResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'type' => $this->type,
            'serial_number' => $this->serial_number,
            'imei' => $this->imei,
            'manufacturer' => $this->manufacturer,
            'model' => $this->model,
            'operating_system' => $this->operating_system,
            'created_at' =>  Carbon::parse($this->created_at)->format('M d Y'), //Or change a date format
            //Or exclude a field like 'updated_at' in this case!
        ];
    }
}
