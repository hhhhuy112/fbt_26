<?php

namespace App\Providers;

use App\Models\Review;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Booking' => 'App\Policies\BookingPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('assess', function (User $user, Tour $tour) {
            return $user->id == $tour->bookings->user_id;
        });
    }
}
