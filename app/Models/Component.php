<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['year_id', 'category_id', 'component', 'iframe_src', 'note'];

    // relasi
    public function Year()
    {
        return $this->belongsTo(Year::class);
    }

    // relasi
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
