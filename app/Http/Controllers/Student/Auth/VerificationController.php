<?php

namespace App\Http\Controllers\Student\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Verification;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class VerificationController extends Controller
{
    use Verification;

    protected $redirectTo = '/student';
    protected $guard = 'student';

    public function __construct()
    {
        $this->middleware('auth:student')->except('logout');
        $this->middleware('signed:student')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');

        VerifyEmail::createUrlUsing(function ($notifiable) {
            $url = URL::temporarySignedRoute(
                'student.verify.submit',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
            // echo $url;
            // exit;
            return $url;
        });
    }
}
