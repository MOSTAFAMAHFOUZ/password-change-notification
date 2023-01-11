<?php 

namespace ven\PasswordChangeNotification\Contracts;
use Illuminate\Mail\Mailable;

interface PasswordChangedContract{

    public static function booted();
    public function passwordColumnName();
    public function emailColumnName();
    public function passwordChangedNotification():Mailable;
    public function passwordChangedQueue();
    public function sendPasswordChangeNotification();
}