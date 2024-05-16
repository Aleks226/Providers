<?php

namespace App\Http\ApiV1\Modules\Providers\Controllers;

use App\Domain\Providers\Actions\CreateProviderAction;
use App\Domain\Providers\Models\Provider;
use App\Http\ApiV1\Modules\Providers\Requests\CreateProviderRequest;
use App\Http\ApiV1\Modules\Providers\Resources\ProvidersResource;


class ProvidersController
{
    public function create(
        CreateProviderRequest $request,
        CreateProviderAction $action,
    ): ProvidersResource {
        $validate = $request->validated();
        $provider = $action->execute($validate);
        
        return new ProvidersResource($provider);
    }

    public function get(int $id): ProvidersResource
    {
        $provider = Provider::query()->findOrFail($id);
        
        return new ProvidersResource($provider);
    }
}
