<?php

namespace App\Http\Controllers\Collaborator\Auth;

use App\Facades\CollaboratorPassword;
use App\Facades\Password;
use App\Http\Controllers\Controller;
use App\Traits\ForgotPassword;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
// use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    use ForgotPassword;
    
    protected $base = 'collaborators';

    public function __construct()
    {
        $this->middleware('guest:collaborator')->except('logout');

        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = url(route('collaborator.resetPassword', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
            return (new MailMessage)
                ->subject(Lang::get('Reset Password Notification'))
                ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
                ->action(Lang::get('Reset Password'), $url)
                ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
                ->line(Lang::get('If you did not request a password reset, no further action is required.'));
        });
    }
}
