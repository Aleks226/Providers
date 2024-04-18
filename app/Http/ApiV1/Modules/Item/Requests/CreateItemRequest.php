<?php

namespace App\Http\ApiV1\Modules\Item\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'provider_id' => ['required', 'integer', 'min:0'],
            'title' => 'required',
            'body' => 'required',
            'price' => ['required', 'integer', 'min:0'],
            'discount' => ['required', 'integer', 'min:0'],
            'status' => 'required'
        ];
    }
}
