<?php

namespace App;

use App\Notifications\ConfirmEmail;
use App\Notifications\ForgotPasswordEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirm_token', 'confirmed', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
     * Check if user email is confirmed
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /*
     * Check if user Active
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * validate Email
     *
     * @param  $email
     * @return object
     */
    public static function getUserByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    /*
     * Send Email confirmation
     * @param $route
     */
    public function sendConfirmationEmail($route)
    {
        $job = new ConfirmEmail($this);
        $job->setRoute($route);
        $this->notify($job);
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $job = new ForgotPasswordEmail($this);
        $job->setRoute(route('password.reset', $token));
        $this->notify($job);
    }
}