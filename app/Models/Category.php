<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //Protected fillable for security from method two inside the CategoryController.php
    protected $fillable = [
        'name'
    ];
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
