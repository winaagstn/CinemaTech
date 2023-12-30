<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function genre()
    {
        return $this->belongsTo(genre::class);
    }

    
}
