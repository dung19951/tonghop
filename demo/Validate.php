<?php


class Validate
{
    public static function chekName($username)
    {
        $pre='/^[A-Za-z]{6,}$/';
        if (!preg_match($pre,$username))
        {
            session_start();
            $_SESSION['username']='sai';
        }
}

    public static function checkMail($email)
    {
        $pre='/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
        if (!preg_match($pre,$email))
        {
            session_start();
            $_SESSION['email']='sai';
        }
}

    public static function chekPass($pass)
    {
        $pre='/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/';
        if (!preg_match($pre,$pass))
        {
            session_start();
            $_SESSION['pass']='sai';
        }
}
}