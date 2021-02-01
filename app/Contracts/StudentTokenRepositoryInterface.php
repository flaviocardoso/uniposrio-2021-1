<?php
namespace App\Contracts;

interface StudentTokenRepositoryInterface
{
    /**
     * Create a new token.
     *
     * @param  Student\CanResetPassword  $user
     * @return string
     */
    public function create(Student\CanResetPassword $user);

    /**
     * Determine if a token record exists and is valid.
     *
     * @param  Student\CanResetPassword  $user
     * @param  string  $token
     * @return bool
     */
    public function exists(Student\CanResetPassword $user, $token);

    /**
     * Determine if the given user recently created a password reset token.
     *
     * @param  StudentCanResetPassword  $user
     * @return bool
     */
    public function recentlyCreatedToken(Student\CanResetPassword $user);

    /**
     * Delete a token record.
     *
     * @param  StudentCanResetPassword  $user
     * @return void
     */
    public function delete(Student\CanResetPassword $user);

    /**
     * Delete expired tokens.
     *
     * @return void
     */
    public function deleteExpired();
}
