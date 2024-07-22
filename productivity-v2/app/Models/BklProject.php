<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BklProject extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "css",
        "user_id",
        "bkl_state_id",
        "client",
        "taking_action",
        "situation",
        "bkl_role_id",
        "bkl_management_id",
        "bkl_priority_id",
        "bkl_type_id",
        "deadline",
        "description",
    ];

    public function bklManagement()
    {
        return $this->belongsTo(BklManagement::class);
    }

    // public function management()
    // {
    //     return $this->belongsTo(BklManagement::class);
    // }

    public function bklRole()
    {
        return $this->belongsTo(BklRole::class);
    }

    public function bklType()
    {
        return $this->belongsTo(BklType::class);
    }

    public function bklState()
    {
        return $this->belongsTo(BklState::class);
    }

    public function bklPriority()
    {
        return $this->belongsTo(BklPriority::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
