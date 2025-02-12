<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_id', 'code', 'name',
    ];

    /**
     * Get the post that owns the comment.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
