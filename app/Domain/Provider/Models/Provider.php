<?php

namespace App\Domain\Provider\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property int $exists_count
 */
class Provider extends Model
{
    protected $table = 'provider';
}
