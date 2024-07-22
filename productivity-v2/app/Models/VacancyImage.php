<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VacancyImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vacancy_id', 'user_id', 'status_id', 'description', 'filename', 'filepath', 'reason'
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
            return Storage::disk('public')->url($this->filepath);
        }
        return Storage::disk('s3')->temporaryUrl($this->filepath, now()->addMinutes(10));
    }

    /**
     * Get the status that owns the vacancy images.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the vacancy that owns the vacancy images.
     */
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
