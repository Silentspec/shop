<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\libs;

/**
 * Description of Auth
 *
 * @author Silentspec
 */
class Auth
{
    
    public static function isGuest()
    {
        return (!isset($_SESSION['user']['id']));
    }
    
    public static function canAccess($role)
    {
        if($_SESSION['user']['role'] == $role)
        {
            return TRUE;
        }
        return FALSE;
    }

    public static function login($id, $role, $login)
    {
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['role'] = $role;
        $_SESSION['user']['name'] = $login;
    }
    
    public static function logout()
    {
        session_unset();
        session_destroy();
    }
    
    public static function getUserId()
    {
        return $_SESSION['user']['id'];
    }
    
    public static function getUserLogin()
    {
        return $_SESSION['user']['name'];
    }
}
