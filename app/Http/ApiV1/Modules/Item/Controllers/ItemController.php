<?php

namespace App\Http\ApiV1\Modules\Item\Controllers;

use App\Domain\Item\Actions\CreateItemAction;
use App\Domain\Item\Models\Item;
use App\Http\ApiV1\Modules\Item\Requests\CreateItemRequest;
use App\Http\ApiV1\Modules\Item\Resources\ItemResource;

class ItemController
{
    public function get(int $id): ItemResource
    {
        $item = Item::query()->findOrFail($id);
        
        return new ItemResource($item);
    }
    
    public function create(
        CreateItemRequest $request,
        CreateItemAction $action,
    ): ItemResource {
        $validate = $request->validated();
        $item = $action->execute($validate);
        
        return new ItemResource($item);
    }
}
