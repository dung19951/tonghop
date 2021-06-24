<?php


class Data
{
    public static $path;

    public static function checkPass($user)
    {$arr=str_split($user->getPass());
        if (count($arr)<6||count($arr>14)){
            throw new Exception("FILE NOT FOUND");
        }

    }

    public static function save($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function load()
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::convertData($data);
    }

    public static function convertData($data)
    {
        $users = [];
        foreach ($data as $item) {
            $user = new User($item->name, $item->pass);
            array_push($users, $user);
        }
        return $users;
    }

    public static function addUser($user)
    {
        $users = self::load();
        array_push($users, $user);
        self::save($users);
    }

    public static function checkLog($user)
    {
        $users = self::load();
        foreach ($users as $item) {
            if ($user->name == $item->name && $user->pass == $item->pass) {
                return true;
            }
            return false;

        }
    }

    public static function login ($name,$pass)
    {
        $user=new User($name,$pass);
        if (self::checkLog($user))
        {
            header('location: ../demo2/index.php');
        }
        else{
            echo 'wrong user';
        }
        }

}