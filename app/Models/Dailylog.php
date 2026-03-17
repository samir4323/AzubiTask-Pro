<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{
    protected $fillable = ['user_id', 'log_date', 'content', 'hours_spent'];

public function user() {
    return $this->belongsTo(User::class);
}
}
