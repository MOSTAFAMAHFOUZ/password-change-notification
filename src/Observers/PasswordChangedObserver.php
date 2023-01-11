<?php

namespace ven\PasswordChangeNotification\Observers;

use ven\PasswordChangeNotification\Contracts\PasswordChangedContract;
use ven\PasswordChangeNotification\Mail\PasswordChangedNotificationMail;

class PasswordChangedObserver
{
    public function updated(PasswordChangedContract $model){
        $model->sendPasswordChangeNotification();
    }
}
