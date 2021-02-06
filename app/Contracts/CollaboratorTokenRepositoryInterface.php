<?php
namespace App\Contracts;

interface CollaboratorTokenRepositoryInterface
{
    /**
     * Create a new token.
     *
     * @param  Collaborator\CanResetPassword  $user
     * @return string
     */
    public function create(Collaborator\CanResetPassword $user);

    /**
     * Determine if a token record exists and is valid.
     *
     * @param  Collaborator\CanResetPassword  $user
     * @param  string  $token
     * @return bool
     */
    public function exists(Collaborator\CanResetPassword $user, $token);

    /**
     * Determine if the given user recently created a password reset token.
     *
     * @param  CollaboratorCanResetPassword  $user
     * @return bool
     */
    public function recentlyCreatedToken(Collaborator\CanResetPassword $user);

    /**
     * Delete a token record.
     *
     * @param  Collaborator\CanResetPassword  $user
     * @return void
     */
    public function delete(Collaborator\CanResetPassword $user);

    /**
     * Delete expired tokens.
     *
     * @return void
     */
    public function deleteExpired();
}
