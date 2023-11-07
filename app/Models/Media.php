<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class Image
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $parent_type
 * @property Model $parent
 * @property string $type
 * @property string $url
 * @property array $meta
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Filesystem $disk
 **/
class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['meta' => 'json'];

    /**
     * @var FilesystemAdapter
     */
    protected $_disk;

    /**
     * Image constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::deleting(function ($image){
            $needed = static::query()->where('name', $image->name)
                ->where('id', '!=', $image->id)->exists();
            if(! $needed){
                $image->disk->delete($image->name);
            }
        });
    }

    /**
     * @return MorphTo
     */
    public function parent(): MorphTo
    {
        return $this->morphTo();
    }

    public function __toString(): string
    {
        return $this->url;
    }

    public function toArray(): array|string
    {
        return $this->url;
    }

    public function getDiskAttribute(): Filesystem|FilesystemAdapter
    {
        if(! $this->_disk){
            $this->_disk = Storage::disk(config('filesystems.local'));
        }
        return $this->_disk;
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        if (filter_var($this->name, FILTER_VALIDATE_URL)) {
            return $this->name;
        }
        return $this->disk->url($this->name) . '?v=' . $this->updated_at?->getTimestamp();
    }

    /**
     * @return string
     */
    public function getLocalUrlAttribute(): string
    {
        return asset(Str::replaceFirst('public', 'storage', $this->name));
    }

    /**
     * @param Model $parent
     * @param UploadedFile $image
     * @param string $path
     * @param string|null $type
     * @param array $meta
     * @return static
     */
    public static function upload(Model $parent, UploadedFile $image, string $path, string $type = null, mixed $meta = []): static
    {
        $instance = new static();
        $name = $instance->disk->putFile($path, $image);
        $instance->fill([
            'name' => $name,
            'parent_id' => $parent->id,
            'parent_type' => get_class($parent),
            'type' => $type,
            'meta' => $meta
        ])->save();

        return $instance;
    }

    /**
     * @param UploadedFile $image
     * @param string $path
     * @return bool
     */
    public function replaceWith(UploadedFile $image, string $path, string $type = null): bool
    {
        Cache::forget($this->parent_type . $this->parent_id);
        $this->disk->delete($this->name);
        $this->name = $this->disk->putFile($path, $image);
        if ($type !== null) {
            $this->type = $type;
        }
        return $this->save();
    }
}
