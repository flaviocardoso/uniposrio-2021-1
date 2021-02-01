<?php
namespace App\Notifications;

use App\Notifications\CollaboratorResetPassword;
use App\Notifications\StudentResetPassword;

trait CanResetPassword
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token, $provider)
    {
        switch ($provider) {
            case 'collaborators':
                $this->notify(new CollaboratorResetPassword($token));
                break;

            case 'students':
                $this->notify(new StudentResetPassword($token));
                break;
            
            default:
                # code...
                break;
        }
    }
}