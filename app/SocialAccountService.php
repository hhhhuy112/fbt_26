<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\Social_account;
use App\Models\User;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = Social_account::whereProvider($social)
            ->whereProviderId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new Social_account([
                'provider_id' => $providerUser->getId(),
                'provider' => $social
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
