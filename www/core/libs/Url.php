<?php

namespace core\libs;


/**
 * Класс для работы с урлом
 */
class Url
{
    
    /**
     * Разбиваем урл на сегменты
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
    public static function getParam($paramName)
    {
        if(isset($_GET[$paramName]))
        return $_GET[$paramName];
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
}
