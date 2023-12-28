<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratingsDashboard extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $guarded = ['id'];
    
    protected $fillable = [
        'rating',
    ];
}
