<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;
use App\Models\User;

use Hash;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::authenticateUsing(function (Request $request) {
            $maxAttempts = 5; // Maximum number of login attempts within the defined time period
            $decayMinutes = 1; // Time period in minutes for which the rate limiting is applied
        
            // Apply rate limiting
            RateLimiter::for('login', function (Request $request) use ($maxAttempts, $decayMinutes) {
                $key = $request->input('email') . '|' . $request->ip();
                return Limit::perMinute($maxAttempts)->by($key);
            });
        
        
            $user = User::where('email', $request->email)->first();
        
            if ($user && Hash::check($request->password, $user->password)) {
                // Authentication successful
                return $user;
            }
        
        
            // Handle authentication failure
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        });
            
    }
}
