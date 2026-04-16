<?php

declare(strict_types=1);

namespace App\Models\Eloquent;

use Database\Factories\CategoryModelFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property bool $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, ProductModel> $products
 * @property-read int|null $products_count
 * @method static CategoryModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|CategoryModel newModelQuery()
 * @method static Builder<static>|CategoryModel newQuery()
 * @method static Builder<static>|CategoryModel query()
 * @method static Builder<static>|CategoryModel whereActive($value)
 * @method static Builder<static>|CategoryModel whereCreatedAt($value)
 * @method static Builder<static>|CategoryModel whereDescription($value)
 * @method static Builder<static>|CategoryModel whereId($value)
 * @method static Builder<static>|CategoryModel whereImage($value)
 * @method static Builder<static>|CategoryModel whereName($value)
 * @method static Builder<static>|CategoryModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'image',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(ProductModel::class);
    }

    protected static function newFactory(): CategoryModelFactory
    {
        return CategoryModelFactory::new();
    }
}
