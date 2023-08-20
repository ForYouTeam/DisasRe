<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flood extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'level','priority','created_at', 'updated_at'
    ];
    
}
