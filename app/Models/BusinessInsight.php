<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessInsight extends Model
{
    protected $fillable = [
        'user_id',
        'business_field',
        'target_market',
        'insight',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
