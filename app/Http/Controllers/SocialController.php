<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialService;

class SocialController extends Controller
{
    protected $drivers = [
        'vkontakte',
        'github'
    ];
    public function redirect($driver)
    {
        if (!in_array($driver, $this->drivers)) {
            return redirect(route('login'))->with('error', __('message.user.auth.login.fail.noexternalauth'));
        } else return Socialite::driver($driver)->redirect();
    }

    public function callback($driver, SocialService $socialService)
    {
        $user = Socialite::driver($driver)->user();
        $res = $socialService->loginOrRegisterViaSocialNetwork($user);
        if (array_key_exists('error', $res)) {
            return redirect(route('login'))->with($res);
        } else return redirect(route('user.profile'));
    }
}
