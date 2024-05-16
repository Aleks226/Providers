<?php

namespace App\Http\ApiV1\Modules\Providers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class UpdateProviderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'data' => ['required'],
            'data.id' => ['required', 'integer'],
            'data.company' => ['string'],
            'data.exists_count' => ['integer'],
        ];
    }
}
