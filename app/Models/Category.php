<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Category extends Model
{
    use HasFactory;
    use LogsActivity;

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

    public function getActivitylogOptions():LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This category has been {$eventName}")
        ->logFillable();
    }
}
