<?php

namespace App\Http\ApiV1\Modules\Providers\Controllers;

use App\Domain\Providers\Actions\CreateProviderAction;
use App\Domain\Providers\Models\Provider;
use App\Domain\Items\Models\Item;
use App\Http\ApiV1\Modules\Providers\Requests\CreateProviderRequest;
use App\Http\ApiV1\Modules\Providers\Requests\DeleteProviderRequest;
use App\Http\ApiV1\Modules\Providers\Requests\UpdateProviderRequest;
use App\Http\ApiV1\Modules\Providers\Resources\ProvidersResource;
use Illuminate\Contracts\Support\Responsable;
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
            return response()->json(['data' => [], 'errors' => [['code' => '404', 'message' => 'Provider not found']]], 404);
        }

        $provider->delete();
        return response()->json(['data' => []], 200);
    }
    
    public function update(Request $request,int $id)
    {
        $provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['data' => [], 'errors' => [['code' => '404', 'message' => 'Provider not found']]], 404);
        }

        $validatedData = $request->validate([
            'company' => 'required|string'
        ]);

        $provider->update($validatedData);
        return response()->json(['data' => new ProvidersResource($provider)], 200);
    }

    public function getAll()
    {
    	if(Provider::count()==0) {
            return response()->json(['data' => [], 'errors' => [['code' => '404', 'message' => 'Provider not found']]], 404);
        }
        
        $result = [];
        foreach (Provider::all() as $provider) {
	    $one['data'] = new ProvidersResource($provider);
	    array($result, $one);
	}
        
        return response()->json($result, 200);
    }

    public function getAllItems(int $id)
    {
    	$provider = Provider::find($id);
        if (!$provider) {
            return response()->json(['data' => [], 'errors' => [['code' => '404', 'message' => 'Provider not found']]], 404);
        }
        $items = Item::where('provider_id', $id)->get();
        
        return response()->json($items, 200);
    }
}
