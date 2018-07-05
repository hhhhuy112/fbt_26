<?php

use Illuminate\Database\Seeder;

class SocialAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Social_account::class, 10)->create()->each(function ($accounts) {
            $accounts->user()->create(factory(App\Models\User::class)->make()->toArray());
        });
    }
}
