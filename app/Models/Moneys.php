<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneys extends Model
{
    use HasFactory;


    public function scopeAuth($query) {
        return $query->where('user_id', auth()->id());
    }
}
