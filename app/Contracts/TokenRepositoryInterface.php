<?php
namespace App\Contracts;

interface TokenRepositoryInterface
{
    /**
     * Create a new token.
     *
     * @param  CanResetPassword  $user
     * @return string
     */
    public function create(CanResetPassword $user);

    /**
     * Determine if a token record exists and is valid.
     *
     * @param  CanResetPassword  $user
     * @param  string  $token
     * @return bool
     */
    public function exists(CanResetPassword $user, $token);

    /**
     * Determine if the given user recently created a password reset token.
     *
     * @param  CanResetPassword  $user
     * @return bool
     */
    public function recentlyCreatedToken(CanResetPassword $user);

    /**
     * Delete a token record.
     *
     * @param  CanResetPassword  $user
     * @return void
     */
    public function delete(CanResetPassword $user);

    /**
     * Delete expired tokens.
     *
     * @return void
     */
    public function deleteExpired();
}
