<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BklProgress extends Model
{
    protected $table = 'bkl_project_progresses';

    use HasFactory;
    protected $fillable = [
        'project_id',
        'avance'
    ];

    

}
