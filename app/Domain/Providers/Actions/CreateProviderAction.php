<?php

namespace App\Domain\Providers\Actions;

use App\Domain\Providers\Models\Provider;

class CreateProviderAction
{
    public static function execute(array $data): Provider
    {
        $provider = new Provider();
        $provider->company = $data['company'];
        $provider->save();
        
        return $provider;
    }
}
