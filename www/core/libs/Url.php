<?php

namespace core\libs;


/**
 * Класс для работы с урлом
 */
class Url
{
    
    /**
     * Разбиваем урл на сегменты
     * @return type
     */
    protected static function getSegmentsFromUrl()
    {
        if(isset($_GET['url']))
        {
            $segments = explode('/', $_GET['url']);
        
        if(empty($segments[count($segments)-1]))
        {
            unset($segments[count($segments)-1]);
        }
        
        $segments = array_map(function ($v){
            return preg_replace('/[\'\\\*]/','',$v);
        }, $segments);
        return $segments;
        }
    }
    
    /**
     * Возвращаем массив параметров
     */
    public static function getParam($paramName=1)
    {
        return self::getSegment(1+$paramName);
    }
    
    /**
     * Возвращаем массив сегмента по номеру
     */
    public static function getSegment($n)
    {
        $segments = self::getSegmentsFromUrl();
        if(isset($segments[$n])) 
        {
            return $segments[$n];
        }
    }
    
    /**
     * Возвращаем массив всех сегментов
     */
    public static function getAllSegments()
    {
        return self::getSegmentsFromUrl();
    }
    
    protected static function checkController($controller)
    {
        if(!file_exists($controller.'.php'))
        {
            throw new HTTPException ('File '.$controller.'.php Not Found','404');
        }
        return $controller;
    }
    
    protected static function checkAction($controller, $action)
    {
        if(!method_exists($controller, $action))
        {
            throw new HTTPException ('Method '.$action.' Not Found','404');
        }
        return $action;
    }
    
    public static function getController($controllerName)
    {
        if(!isset($controllerName))
        {
            $controller = 'core\controllers\ControllerMain';
        }
        else
        {
            $controller = 'core\controllers\Controller'.ucfirst($controllerName);
        }
        return self::checkController($controller);
    }
    
    public static function getAction($controller,$actionName)
    {
        if(is_null($actionName))
        {
            $action = 'actionIndex';
        }
        else
        {
            $action = 'action'.ucfirst($actionName);
        }
        return self::checkAction($controller,$action);
    }
}
