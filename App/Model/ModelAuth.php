<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class ModelAuth extends BaseModel
{
    public function userLogin($data){

        extract($data);

        $password = md5($password);

        $user = $this->db->query("SELECT * FROM users 
            WHERE users.username = '$username' && users.password = '$password' ");

        if ($user){
            Session::setSession('login',true);
            Session::setSession('username',$user['username']);
            Session::setSession('id',$user['id']);
            Session::setSession('password',$user['password']);
            return true;
        }else{
            return false;
        }
    }
}