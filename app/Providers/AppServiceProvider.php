<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Laravel\Fortify\Contracts\PasswordResetLinkViewResponse;
use Laravel\Fortify\Contracts\ResetPasswordViewResponse;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse;
use App\Actions\Fortify\Responses\LoginViewResponse as CustomLoginViewResponse;
use App\Actions\Fortify\Responses\RegisterViewResponse as CustomRegisterViewResponse;
use App\Actions\Fortify\Responses\PasswordResetLinkViewResponse as CustomPasswordResetLinkViewResponse;
use App\Actions\Fortify\Responses\ResetPasswordViewResponse as CustomResetPasswordViewResponse;
use App\Actions\Fortify\Responses\VerifyEmailViewResponse as CustomVerifyEmailViewResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginViewResponse::class, CustomLoginViewResponse::class);
        $this->app->singleton(RegisterViewResponse::class, CustomRegisterViewResponse::class);
        $this->app->singleton(PasswordResetLinkViewResponse::class, CustomPasswordResetLinkViewResponse::class);
        $this->app->singleton(ResetPasswordViewResponse::class, CustomResetPasswordViewResponse::class);
        $this->app->singleton(VerifyEmailViewResponse::class, CustomVerifyEmailViewResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
