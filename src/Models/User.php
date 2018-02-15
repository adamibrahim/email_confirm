<?php

namespace App;

use App\Notifications\ConfirmEmail;

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
        'name', 'email', 'password', 'confirm_token', 'status',
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
     * Send Email confirmation
     * @param $route
     */
    public function sendConfirmationEmail($route)
    {
        $job = new ConfirmEmail($this);
        $job->setRoute($route);
        $this->notify($job);
    }


}
