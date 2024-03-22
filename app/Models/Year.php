<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Year extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = ['year'];

    // Relasi dengan Category
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function getActivitylogOptions():LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This version has been {$eventName}")
        ->logFillable();
    }
}
