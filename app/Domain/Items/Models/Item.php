<?php

namespace App\Domain\Items\Models;

use App\Domain\Items\Models\Tests\Factories\ItemFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $provider_id
 *
 * @property text $title
 * @property text $body
 * @property int $price
 * @property int $discount
 * @property text $status
 *
 * @property CarbonInterface|null $created_at
 * @property CarbonInterface|null $updated_at
 */
class Item extends Model
{
    protected $table = 'items';
    public $status = 'EXISTS';
    protected $fillable = ['title', 'body', 'price', 'discount', 'status'];
    
    public static function factory(): ItemFactory
    {
        return ItemFactory::new();
    }
}
