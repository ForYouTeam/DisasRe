<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'flood_id', 
        'report_id', 
        'level',
        'priority',
        'desc',
        'location',
        'longtitude',
        'latitude',
        'created_at', 
        'updated_at'
    ];

    public function flood()
    {
        return $this->belongsTo(Flood::class, 'flood_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
