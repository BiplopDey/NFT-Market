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

    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments')
    	->withPivot('comment')->withTimestamps();
    }

    public function addComment($user, $comment)
    {
        $this->comments()->attach($user->id, ['comment'=>$comment]);
    }

    public function lovers()
    {
        return $this->belongsToMany(User::class, 'loves');
    }

    public static function topInstants(int $top)
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
