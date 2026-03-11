<?php

namespace App\Models;

use App\Models\User;
use App\Models\Department;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'department_id',
        'title',
        'description',
        'status',
        'due_date'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

    public function department()
{
    return $this->belongsTo(Department::class);
}
}
