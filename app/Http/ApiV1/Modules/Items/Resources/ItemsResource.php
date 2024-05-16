<?php

namespace App\Http\ApiV1\Modules\Items\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin todo
 */
class ItemsResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        // todo
        return [
            'id' => $this->id,
            'provider_id' => $this->provider_id,
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'discount' => $this->discount,
            'status' => $this->status,
        ];
    }
}