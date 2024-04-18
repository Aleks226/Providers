<?php

namespace App\Http\ApiV1\Modules\Item\Resources;

use App\Domain\Item\Models\Item;
use App\Http\ApiV1\Support\Resources\BaseJsonResources;

/**
 * @mixin Item
 */
class ItemResource extends BaseJsonResources
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'provider_id' => $this->provider_id,
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
            'discount' => $this->discount,
            'status' => $this->status
        ];
    }
}
