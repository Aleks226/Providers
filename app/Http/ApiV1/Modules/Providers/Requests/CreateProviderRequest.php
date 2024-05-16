<?php

namespace App\Http\ApiV1\Modules\Providers\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateProviderRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'company' => ['string'],
        ];
    }
}
