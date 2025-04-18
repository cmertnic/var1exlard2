<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'cost',
        'tour_id', 
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour() 
    {
        return $this->belongsTo( Tour::class); 
    }      
    
}
