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
        'user_id',
        'loversCount',
    ];

    public function lovers()
    {
        return $this->belongsToMany(User::class, 'loves');
    }

    public static function topLovers(int $top)
    {
        return self::orderBy('loversCount','desc')->take($top)->get();
    }

    public function attachUser(User $user)
    {   
        $user->loves()->attach($this);
        $this->loversCount ++;
        $this->save();
    }

    public function detachUser(User $user)
    {
        $user->loves()->detach($this);
        $this->loversCount --;
        $this->save();
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
}
