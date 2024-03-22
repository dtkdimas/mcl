<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Component extends Model
{
    use HasFactory;
    use LogsActivity;

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

    public function getActivitylogOptions():LogOptions
    {
        return LogOptions::defaults()
        ->setDescriptionForEvent(fn(string $eventName) => "This component has been {$eventName}")
        ->logFillable();
    }
}
