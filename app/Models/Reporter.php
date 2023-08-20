<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'phone','address','selfie','created_at', 'updated_at'
    ];
}
