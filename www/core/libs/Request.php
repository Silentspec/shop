<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\libs;

/**
 * Description of Request
 *
 * @author Silentspec
 */
class Request
{
    public static function isPost()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            return TRUE;
        }
        return FALSE;
    }
    
    public static function getPost($param=null)
    {
        if(is_null($param))
        {
            return $_POST;
        }
        else
        {
            return $_POST[$param];
        }
    }
}