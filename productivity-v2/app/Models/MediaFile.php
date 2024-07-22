<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaFile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path', 'category_id', 'color'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['url'];

    /**
     * Get the file url.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        if (config('app.env') === 'local') {
            return Storage::disk('public')->url($this->path);
        }

        return Storage::disk('s3')->temporaryUrl($this->path, now()->addMinutes(3));
    }

    /**
     * Get the category that owns the media file.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
