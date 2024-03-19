<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable = ['year'];

    // Relasi dengan Category
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
