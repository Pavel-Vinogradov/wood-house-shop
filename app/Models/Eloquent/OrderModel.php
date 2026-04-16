<?php

declare(strict_types=1);

namespace App\Models\Eloquent;

use Database\Factories\OrderModelFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 * @property string $status
 * @property numeric $total_amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static OrderModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|OrderModel newModelQuery()
 * @method static Builder<static>|OrderModel newQuery()
 * @method static Builder<static>|OrderModel query()
 * @method static Builder<static>|OrderModel whereCreatedAt($value)
 * @method static Builder<static>|OrderModel whereCustomerEmail($value)
 * @method static Builder<static>|OrderModel whereCustomerName($value)
 * @method static Builder<static>|OrderModel whereCustomerPhone($value)
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

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'status',
        'total_amount',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
    ];

    protected static function newFactory(): OrderModelFactory
    {
        return OrderModelFactory::new();
    }
}
