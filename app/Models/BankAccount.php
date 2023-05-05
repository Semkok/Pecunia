<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    public function bic(){
        return $this->belongsTo(Bic::class);
    }
}
