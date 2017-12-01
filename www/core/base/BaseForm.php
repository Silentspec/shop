<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base;

/**
 * Description of BaseForm
 *
 * @author Silentspec
 */
abstract class BaseForm
{
    protected $errors = [];
    protected $data;
    protected $validator = null;
    
    abstract public function getRules();

    public function validate()
    {
        $validator = new \core\libs\Validator($this->data, $this->getRules());
        if(!empty($this->tableName))
        {
            $validator->setTable($this->tableName);
        }
        if(!$validator->validateThis())
        {
            $this->errors = $validator->getErrors();
            var_dump($validator->getErrors());
            return FALSE;
        }
        return TRUE;
    }
    
    public function load($data)
    {
        foreach ($data as $propName => $propValue)
        {
            if(property_exists(static::class, $propName))
            {
                $this->$propName = $propValue;
                $this->data[$propName] = $propValue;
            }
            else
            {
                return FALSE;
            }
        }
        return TRUE;
    }
    
    public static function getErrors()
    {
        return $this->errors;
    }
    
}