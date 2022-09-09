<?php

namespace App;

use Auth;
use App\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'title', 'text',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        // return $this->hasMany('App\Comment', 'post_id');
        return $this->hasOne('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function isContributor($user_id)
    {
        if ($user_id === Auth::id()) {
            return true;
        } else {
            return false;
        }
    }

    public function isLikedBy($user_id)
    {

        if (Like::where('user_id', $user_id)->where('post_id', $this->id)->first() !== null) {
            return true;
        } else {
            return false;
        }
    }
}
