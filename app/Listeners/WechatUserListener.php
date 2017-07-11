<?php

namespace App\Listeners;

use Overtrue\LaravelWechat\Events\WeChatUserAuthorized;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WechatUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WeChatUserAuthorized  $event
     * @return void
     */
    public function handle(WeChatUserAuthorized $event)
    {
        if( $event->isNewSession ){
            //新授权用户写入表
            $user = $event->user;
            \App\WechatUser::updateOrCreate([
                'openid' => $user->id,
                'nickname' => $user->nickname,
                'avatar' => $user->avatar,
                'sex' => $user->original->sex,
                'province' => $user->original->province,
                'city' => $user->original->city,
                'country' => $user->original->country,
            ]);
        }
    }
}
