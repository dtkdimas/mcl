<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['year_id', 'category'];

    // relasi dengan year
    public function Year()
    {
        return $this->belongsTo(Year::class);
    }

    // Relasi dengan Component
    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
