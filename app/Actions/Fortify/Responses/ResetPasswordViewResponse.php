<?php

namespace App\Actions\Fortify\Responses;

use Laravel\Fortify\Contracts\ResetPasswordViewResponse as ResetPasswordViewResponseContract;

class ResetPasswordViewResponse implements ResetPasswordViewResponseContract
{
    public function toResponse($request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }
}
