<?php

namespace App\Domain\Item\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property int $provider_id
 * @property string $title
 * @property string $body
 * @property int $price
 * @property int $discount
 * @property string $status
 *
 * @property CarbonInterface|null $created_at
 * @property CarbonInterface|null $updated_at
 */
class Item extends Model
{
    protected $table = 'item';
}