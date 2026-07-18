<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Doctor extends Model
{
    protected $fillable = [
        'department_id',
        'name',
        'qualification',
        'experience',
        'phone',
        'shift_start_date_time',
        'shift_end_date_time',
        'image',
        'bio',
    ];

    public function department() : BelongsTo {
       return $this->belongsTo(Department::class);
    }
}
