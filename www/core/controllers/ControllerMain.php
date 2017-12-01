<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\controllers;
use core\base;

/**
 * Description of ControllerMain
 *
 * @author Silentspec
 */
class ControllerMain extends base\Controller
{
    public function actionIndex()
    {
        $model = \core\models\Posts::getAllPosts();
        $this->view->setTitle('Main');
        $this->view->render(['header'=>'header','nav'=>'nav','sidenav'=>'side_menu','section'=>'main','footer'=>'footer'],['model' => $model]);
    }
    
    public function actionLogin()
    {
        if(\core\libs\Auth::isGuest())
        {
            $model = new \core\models\LoginForm();
            if(\core\libs\Request::isPost())
            {
                if($model->load(\core\libs\Request::getPost()) && $model->validate())
                {
                    if($model->doLogin())
                    {
                        header("Location: /");
                    }
                }
            }
            $this->view->setTitle('Login');
            $this->view->setJs('../../../assets/uikit-2.27.4/js/components/form-password.min.js');
            $this->view->render(['header'=>'header','nav'=>'nav','section'=>'login'],['model'=>$model]);
        }
        else
        {
            throw new \Exception('Forbidden','403');
        }
    }
    
    public function actionLogout()
    {
        if(!\core\libs\Auth::isGuest())
        {
            \core\libs\Auth::logout();
            header("Location: /");
        }
        else
        {
            throw new \Exception('Forbidden','403');
        }
    }
    
    public function actionRegister()
    {
        if(\core\libs\Auth::isGuest())
        {
            $model = new \core\models\RegisterForm();
            if(\core\libs\Request::isPost())
            {
                if($model->load(\core\libs\Request::getPost())&& $model->validate())
                {
                    if($model->doRegister())
                    {
                        header('Location: /');
                    }
                }
            }
            $this->view->setTitle('Registration');
            $this->view->render(['header'=>'header','nav'=>'nav','sidenav'=>'side_menu','section'=>'registration','footer'=>'footer'],['model'=>$model]);
        }
        else
        {
            throw new \Exception('Forbidden','403');
        }
    }
}
