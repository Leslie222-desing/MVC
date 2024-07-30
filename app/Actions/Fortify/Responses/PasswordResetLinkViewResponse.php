<?php

namespace App\Actions\Fortify\Responses;

use Laravel\Fortify\Contracts\PasswordResetLinkViewResponse as PasswordResetLinkViewResponseContract;

class PasswordResetLinkViewResponse implements PasswordResetLinkViewResponseContract
{
    public function toResponse($request)
    {
        return view('auth.forgot-password');
    }
}
