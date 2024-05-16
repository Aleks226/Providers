<?php

namespace App\Http\ApiV1\Modules\Items\Controllers;

use App\Domain\Items\Actions\CreateItemAction;
use App\Domain\Items\Models\Item;
use App\Domain\Providers\Models\Provider;
use App\Http\ApiV1\Modules\Items\Requests\CreateItemRequest;
use App\Http\ApiV1\Modules\Items\Resources\ItemsResource;

use Illuminate\Http\Request;

class ItemsController
{
    public function create(
        CreateItemRequest $request,
        CreateItemAction $action,
    ) {
        $validate = $request->validated();
        $provider = Provider::find($validate['provider_id']);
        if (!$provider) {
            return response()->json(['message' => 'Provider not found'], 404);
        }
        
        $item = $action->execute($validate);
        
        return response()->json($item, 201);
    }

    public function get(int $id): ItemsResource
    {
        $item = Item::query()->findOrFail($id);
        
        return new ItemsResource($item);
    }

    public function delete(int $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $item->delete();
        return response()->json(['message' => 'Item deleted'], 200);
    }
    
    public function update(Request $request,int $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'price' => 'required|integer',
            'discount' => 'integer'
        ]);

        $item->update($validatedData);
        return response()->json($item, 200);
    }
    
    public function getAll()
    {
        return response()->json(Item::all(), 200);
    }
}
