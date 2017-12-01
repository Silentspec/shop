<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\models;

/**
 * Description of RegisterForm
 *
 * @author Silentspec
 */
class RegisterForm extends \core\base\BaseForm
{
    public $login;
    public $password;
    public $password_confirm;
    
    protected $tableName = 'user';

    public function getRules()
    {
        return 
        [
            'login' => ['required', 'email', 'unique'],
            'password' => ['required', 'confirm'],
        ];
    }
    
    public function doRegister()
    {
        $password = md5($this->password);
        $sql = "INSERT INTO user (login, password) VALUES ('{$this->login}', '{$password}')";
        $row = \core\libs\DataBase::sendQuery($sql)->fetch();
        if(!$row)
        {
            $this->errors['register'] = 'Error!';
            return FALSE;
        }
        $id = \core\libs\DataBase::getLastInsertId();
        $login = $this->login;
        $role = 'user';
        \core\libs\Auth::login($id,$role);
        return TRUE;
    }
}
