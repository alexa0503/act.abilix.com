<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $appends = ['has_voted'];
    public function getHasVotedAttribute($value)
    {
        if($this->voter){
            return true;
        }
        else{
            return false;
        }
    }
    public function voters()
    {
        return $this->hasMany('App\Vote');
    }
    public function voter()
    {
        return $this->hasOne('App\Vote')->where('voter_id', session('user_id'));
    }
    public function user()
    {
        return $this->belongsTo('App\WechatUser');
    }
}
