<?php

namespace App;

use Auth;
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
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function isContributor($user_id)
    {
        if ($user_id === Auth::id()) {
            return true;
        } else {
            return false;
        }
    }
}
