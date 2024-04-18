<?php

namespace App\Domain\Item\Actions;

use App\Domain\Item\Models\Item;

class CreateItemAction
{
    public static function execute(array $data): Item
    {
        $item = new Item();
        $item->provider_id = $data['provider_id'];
        $item->title = $data['title'];
        $item->body = $data['body'];
        $item->price = $data['price'];
        $item->discount = $data['discount'];
        $item->status = $data['status'];
        $item->save();
        
        return $item;
    }
}
