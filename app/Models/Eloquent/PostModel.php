<?php

declare(strict_types=1);

namespace App\Models\Eloquent;

use Database\Factories\PostModelFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $excerpt
 * @property string|null $image
 * @property bool $published
 * @property Carbon|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static PostModelFactory factory($count = null, $state = [])
 * @method static Builder<static>|PostModel newModelQuery()
 * @method static Builder<static>|PostModel newQuery()
 * @method static Builder<static>|PostModel query()
 * @method static Builder<static>|PostModel whereContent($value)
 * @method static Builder<static>|PostModel whereCreatedAt($value)
 * @method static Builder<static>|PostModel whereExcerpt($value)
 * @method static Builder<static>|PostModel whereId($value)
 * @method static Builder<static>|PostModel whereImage($value)
 * @method static Builder<static>|PostModel wherePublished($value)
 * @method static Builder<static>|PostModel wherePublishedAt($value)
 * @method static Builder<static>|PostModel whereTitle($value)
 * @method static Builder<static>|PostModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'image',
        'published',
        'published_at',
    ];

    protected $casts = [
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function newFactory(): PostModelFactory
    {
        return PostModelFactory::new();
    }
}
