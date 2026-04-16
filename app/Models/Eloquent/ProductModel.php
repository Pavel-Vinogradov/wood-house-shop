<?php

declare(strict_types=1);

namespace App\Models\Eloquent;

use Database\Factories\ProductModelFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property numeric $price
 * @property string|null $image
 * @property int $stock
 * @property bool $active
 * @property int|null $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read CategoryModel|null $category
 * @method static ProductModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|ProductModel newModelQuery()
 * @method static Builder<static>|ProductModel newQuery()
 * @method static Builder<static>|ProductModel query()
 * @method static Builder<static>|ProductModel whereActive($value)
 * @method static Builder<static>|ProductModel whereCategoryId($value)
 * @method static Builder<static>|ProductModel whereCreatedAt($value)
 * @method static Builder<static>|ProductModel whereDescription($value)
 * @method static Builder<static>|ProductModel whereId($value)
 * @method static Builder<static>|ProductModel whereImage($value)
 * @method static Builder<static>|ProductModel whereName($value)
 * @method static Builder<static>|ProductModel wherePrice($value)
 * @method static Builder<static>|ProductModel whereStock($value)
 * @method static Builder<static>|ProductModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'stock',
        'active',
        'category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'active' => 'boolean',
    ];

    protected static function newFactory(): ProductModelFactory
    {
        return ProductModelFactory::new();
    }
}
