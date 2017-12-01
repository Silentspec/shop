<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace core\models;
/**
 * Description of LoginForm
 *
 * @author Silentspec
 */
class LoginForm extends \core\base\BaseForm
{
    public $login;
    public $password;

    protected $tableName = 'user';
    
    public function getRules()
    {
        return
        [
            'login' => ['required','email'],
            'password' => ['required'],
        ];
    }
    
    public function doLogin()
    {
        $password = md5($this->password);
        $sql = "SELECT id, role,login FROM {$this->tableName} WHERE login ='".$this->login."' AND password = '".$password."'";
        $row = \core\libs\DataBase::sendQuery($sql)->fetch();
        if(!empty($row))
        {
            $id = $row['id'];
            $role = 'user';
            $login = $row['login'];
            \core\libs\Auth::login($id,$role,$login);
            return true;
        }
        else
        {
            return false;
        }
    }
}
