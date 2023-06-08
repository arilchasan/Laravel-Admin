<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KomentarResource extends JsonResource
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
            'komentar' => $this->komentar,
            'user_id' => new UserResource($this->whenLoaded('user')),
            'destinasi_id' => new DestinasiResource($this->whenLoaded('destinasi')),
        ];
    }
}
