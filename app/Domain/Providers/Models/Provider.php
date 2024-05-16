<?php

namespace App\Domain\Providers\Models;

use App\Domain\Providers\Models\Tests\Factories\ProviderFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $company
 * @property int $exists_count
 */
class Provider extends Model
{
    protected $table = 'providers';
    public $timestamps = false;
    
    public static function factory(): ProviderFactory
    {
        return ProviderFactory::new();
    }
}
