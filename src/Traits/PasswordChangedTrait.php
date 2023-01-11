<?php

namespace ven\PasswordChangeNotification\Traits;
use ven\PasswordChangeNotification\Mail\PasswordChangedNotificationMail;
use ven\PasswordChangeNotification\Observers\PasswordChangedObserver;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;



trait PasswordChangedTrait{

    public static function booted(){
        static::observe(PasswordChangedObserver::class);
    }

    public function passwordColumnName(){
        return 'password';
    }

    public function emailColumnName(){
        return 'email';
    }

    public function passwordChangedNotification(): Mailable{
        return new PasswordChangedNotificationMail();
    }

    public function passwordChangedQueue(){
        return false;
    }


    public function sendPasswordChangeNotification(){
        if($this->wasChanged($this->passwordColumnName())){
            // fire email
            // dd($this->emailColumnName());
            $mail = Mail::to($this->getRawOriginal($this->emailColumnName()));

            if(!$this->passwordChangedQueue()){
                $mail->send($this->passwordChangedNotification());
                return;
            }
            $mail->queue($this->passwordChangedNotification());
        }
    }
}