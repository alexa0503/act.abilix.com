<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model
{
    protected $fillable = [
        'openid',
        'nickname',
        'sex',
        'avatar',
        'province',
        'city',
        'country'
    ];
}
