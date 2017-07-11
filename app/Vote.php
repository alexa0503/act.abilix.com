<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function voter()
    {
        return $this->belongsTo('App\WechatUser');
    }
    public function form()
    {
        return $this->belongsTo('App\Form');
    }
}
