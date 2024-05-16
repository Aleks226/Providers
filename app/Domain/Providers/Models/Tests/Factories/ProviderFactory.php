<?php

namespace App\Domain\Providers\Models\Tests\Factories;

use App\Domain\Providers\Models\Provider;
use Ensi\LaravelTestFactories\BaseModelFactory;

class ProviderFactory extends BaseModelFactory
{
    protected $model = Provider::class;

    public function definition(): array
    {
        return [
            'company' => $this->faker->name()
        ];
    }
}
