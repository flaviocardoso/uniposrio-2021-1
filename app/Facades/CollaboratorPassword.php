<?php

namespace App\Facades;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Support\Facades\Facade as BaseFacede;

// use Illuminate\Contracts\Auth\PasswordBroker;

/**
 * @method static mixed reset(array $credentials, \Closure $callback)
 * @method static string sendResetLink(array $credentials)
 * @method static \App\Contracts\CollaboratorCanResetPassword getUser(array $credentials)
 * @method static string createToken(\App\Contracts\CollaboratorCanResetPasswordd $user)
 * @method static void deleteToken(\App\Contracts\CollaboratorCanResetPassword $user)
 * @method static bool tokenExists(\App\Contracts\CollaboratorCanResetPassword $user, string $token)
 * @method static \App\Contracts\CollaboratorTokenRepositoryInterface getRepository()
 * @method static \App\Services\CollaboratorPasswordBroker broker(string|null $name = null)
 *
 * @see \App\Services\CollaboratorPasswordBroker
 */
class CollaboratorPassword extends BaseFacede
{
    /**
     * Constant representing a successfully sent reminder.
     *
     * @var string
     */
    const RESET_LINK_SENT =  PasswordBroker::RESET_LINK_SENT;

    /**
     * Constant representing a successfully reset password.
     *
     * @var string
     */
    const PASSWORD_RESET = PasswordBroker::PASSWORD_RESET;

    /**
     * Constant representing the user not found response.
     *
     * @var string
     */
    const INVALID_USER = PasswordBroker::INVALID_USER;

    /**
     * Constant representing an invalid token.
     *
     * @var string
     */
    const INVALID_TOKEN = PasswordBroker::INVALID_TOKEN;

    /**
     * Constant representing a throttled reset attempt.
     *
     * @var string
     */
    const RESET_THROTTLED = PasswordBroker::RESET_THROTTLED;

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'auth.password.collaborator';
    }
}
