<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contract\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SocialService implements Social
{
    private function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function loginOrRegisterViaSocialNetwork(SocialUser $socialUser): array
    {
        $user = $this->getUserByEmail($socialUser->getEmail());
        if ($user) {
            if ($socialUser->getName()) $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return ['success' => __('message.user.update.success')];
            } else return ['error' => __('message.user.update.fail')];
        } else {
            $user = new User;
            $user->fill([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'avatar' => $socialUser->getAvatar(),
                'password' => ''
            ]);
            if (!$user->name) $user->name = $user->email;
            if ($user->save()) {
                Auth::loginUsingId($this->getUserByEmail($socialUser->getEmail())->id);
                return ['success' => __('message.user.register.success')];
            } else return ['error' => __('message.user.register.fail')];
        }

        throw new ModelNotFoundException("Model Not Found");
    }
}
