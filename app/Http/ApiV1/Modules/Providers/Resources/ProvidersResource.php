<?php

namespace App\Http\ApiV1\Modules\Providers\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin todo
 */
class ProvidersResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        // todo
        return [
            'id' => $this->id,
            'company' => $this->company,
            'exists_count' => $this->exists_count,
        ];
    }
}