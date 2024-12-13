<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'daily_generations',
        'last_generation_reset',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function insights()
    {
        return $this->hasMany(BusinessInsight::class);
    }

    public function canGenerate()
    {
        if ($this->role === 'buddy') {
            return true;
        }

        $today = now()->startOfDay();
        if ($this->last_generation_reset < $today) {
            $this->daily_generations = 0;
            $this->last_generation_reset = $today;
            $this->save();
        }

        return $this->daily_generations < 5;
    }
}
