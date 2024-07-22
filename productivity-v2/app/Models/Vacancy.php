<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        "category_id",
        "position",
        "city_id",
        "description",
        "erp_vacancy_id",
        "link",
        "salary",
        'status_id'
    ];

    /**
     * Get the city that owns the vacancy.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the status that owns the vacancy.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the images for the blog vacancy.
     */
    public function vacancyImages()
    {
        return $this->hasMany(VacancyImage::class);
    }

    /**
     * Get the categoy that owns the vacancy.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the vacancy.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
