<?php
namespace App\Filament\Resources\WorkResource\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Work;

/**
 * @property Work $resource
 */
class WorkTransformer extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
