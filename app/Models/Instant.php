<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'img',
        'user_id'
    ];

    public function lovers()
    {
        return $this->belongsToMany(User::class, 'loves');
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
