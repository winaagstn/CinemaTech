<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genreDashboard extends Model
{
    use HasFactory;

    protected $table = 'genre';

    protected $guarded = ['id'];
    
    protected $fillable = [
        'GenreName',
    ];

}
