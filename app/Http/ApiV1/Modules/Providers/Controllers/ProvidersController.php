<?php

namespace App\Http\ApiV1\Modules\Providers\Controllers;

use App\Domain\Providers\Actions\CreateProviderAction;
use App\Domain\Providers\Models\Provider;
use App\Http\ApiV1\Modules\Providers\Requests\CreateProviderRequest;
use App\Http\ApiV1\Modules\Providers\Resources\ProvidersResource;

use Illuminate\Http\Request;

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
    
    public function delete(int $id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        $provider->delete();
        return response()->json(['message' => 'Provider deleted'], 200);
    }
    
    public function update(Request $request,int $id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }

        $validatedData = $request->validate([
            'company' => 'required|string'
        ]);

        $provider->update($validatedData);
        return response()->json($provider, 200);
    }
}
