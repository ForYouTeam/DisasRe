<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'reporter_id', 'report_number','created_at', 'updated_at'
    ];

    public function reporter()
    {
        return $this->belongsTo(Reporter::class, 'reporter_id');
    }
}
