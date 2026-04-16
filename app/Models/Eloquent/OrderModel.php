<?php

declare(strict_types=1);

namespace App\Models\Eloquent;

use App\Enums\OrderStatus;
use App\Models\User;
use Database\Factories\OrderModelFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property int $user_id
 * @property OrderStatus $status
 * @property numeric $total_amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read User|null $user
 * @method static OrderModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|OrderModel newModelQuery()
 * @method static Builder<static>|OrderModel newQuery()
 * @method static Builder<static>|OrderModel query()
 * @method static Builder<static>|OrderModel whereCreatedAt($value)
 * @method static Builder<static>|OrderModel whereId($value)
 * @method static Builder<static>|OrderModel whereStatus($value)
 * @method static Builder<static>|OrderModel whereTotalAmount($value)
 * @method static Builder<static>|OrderModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'total_amount' => 'decimal:2',
    ];

    protected static function newFactory(): OrderModelFactory
    {
        return OrderModelFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
