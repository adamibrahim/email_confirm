<?php

namespace Adam\EmailConfirm\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class ConfirmEmail extends Notification implements ShouldQueue
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
            ->subject(trans('emailConfirm::auth.confirmYourEmail'))
            ->Greeting(implode(' ', [trans('emailConfirm::auth.greetingsFrom'), config('app.name')  ]))
            ->line(implode(' ', [trans('emailConfirm::auth.please'), trans('emailConfirm::auth.confirmYourEmail')]))
            ->action(trans('emailConfirm::auth.confirmYourEmail'), $this->route)
            ->line(trans('emailConfirm::auth.thankYouForUsingOurApplication'))
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
