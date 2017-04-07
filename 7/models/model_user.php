<?php

class User extends Illuminate\Database\Eloquent\Model
{
    public $timestamps = false;

    public function checkLoginExistence($login)
    {
        return self::where('login', '=', "$login")->first();
    }

    public function registerNewUser($login, $password, $ipv4)
    {
        $this->login = "$login";
        $this->password = "$password";
        $this->ipv4 = "$ipv4";
        return $this->save();
    }

    public function login($login, $password)
    {
        $user = self::where('login', '=', "$login")
            ->where('password', '=', "$password")
            ->first();
        if (!empty($user)) {
            return $user->id;
        } else {
            return NULL;
        }
    }

    public function getDataFromDatabase($id)
    {
        return self::find($id);
    }

    public function updatePersonalInfo($name, $age, $description, $file_name)
    {
        $this->name = "$name";
        $this->age = "$age";
        $this->description = "$description";
        $this->photo = "$file_name";
        return $this->save();
    }
}