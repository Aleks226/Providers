<?php

namespace App\Http\ApiV1\Modules\Items\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateItemRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'discount' => ['integer'],
            'price' => ['integer'],
            'body' => ['string'],
            'title' => ['string'],
            'provider_id' => ['integer'],
        ];
    }
}
