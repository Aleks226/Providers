<?php

namespace App\Domain\Items\Models\Tests\Factories;

use App\Domain\Items\Models\Item;
use Ensi\LaravelTestFactories\BaseModelFactory;

class ItemFactory extends BaseModelFactory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
	    'body' => $this->faker->text(),
	    'price' => $this->faker->numberBetween(0, 100_000),
	    'discount' => $this->faker->numberBetween(0, 20)
        ];
    }
}
