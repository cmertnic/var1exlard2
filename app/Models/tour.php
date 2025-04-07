<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path_img',
        'date',
        'price',
    ];

    public function request()
    {
        return $this->hasMany(Request2::class, 'tour_id'); 
    }
}
