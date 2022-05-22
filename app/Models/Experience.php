<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'end_date', 'job_title', 'company', 'company_logo', 'job_description'
    ];
    
}
