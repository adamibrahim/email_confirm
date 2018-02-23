<?php

namespace Adam\ConfirmEmail\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class ForgotPasswordEmail extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $route;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject(trans('emailConfirm::auth.resetYourPassword'))
        ->Greeting(implode(' ', [trans('emailConfirm::auth.greetingsFrom'), config('app.name')  ]))
        ->line(trans('emailConfirm::auth.followTheBelowLinkToResetYourPassword'))
        ->action(trans('emailConfirm::auth.resetYourPassword'), $this->route)
        ->markdown('emailConfirm::notifications.auth-notifications',['user'=> $this->user]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route)
    {
        $this->route = $route;
    }

}
