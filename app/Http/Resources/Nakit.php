<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Nakit extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pol = \App\Models\Pol::find($this->polId);
        $materijal = \App\Models\Materijal::find($this->materijalId);

        return [
            'id' => $this->id,
            'model' => $this->model,
            'gramaza' => $this->gramaza,
            'pol' => new Pol($pol),
            'materijal' => new Materijal($materijal)
        ];
    }
}
