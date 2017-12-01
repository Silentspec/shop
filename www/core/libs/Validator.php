<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\libs;

/**
 * Description of Validator
 *
 * @author Silentspec
 */
class Validator
{
    protected $errors = [];
    protected $rules = [];
    protected $fields = [];
    protected $data = [];
    
    protected $table;


    public function __construct($data, $rules)
    {
        $this->rules = $rules;
        $this->data = $data;

        $this->fields = array_keys($rules);
    }
    
    protected function required($field)
    {
        if(empty($this->data[$field]))
        {
            $this->addError($field,'Field must be set!');
        }
    }
    
    protected function email($field)
    {
        if(!preg_match('/^([\w\-.])+@+([\w\-]{2}+.+[a-zA-Z]{2})$/', $this->data[$field]))
        {
            $this->addError($field,'Email is in wrong format!');
        }
    }
    
    protected function unique($field)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = '{$this->data[$field]}'";
        $res = DataBase::sendQuery($sql);
        if(!empty($res))
        {
            $this->addError($field,'Not unique!'); 
        }
    }
    
    protected function confirm($field)
    {
        if($this->data[$field] != $this->data[$field.'_confirm'])
        {
            $this->addError($field,$field.' not match with '.$field.'_confirm');
        }
    }

    public function addError($field,$error)
    {
        $this->errors[$field] = $error;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
    
    public function getError($field)
    {
        if(isset($this->errors[$field])) 
        {
            return $this->errors[$field];
        }
        else 
        {
            return null;
        }
    }
    
    public function validateThis()
    {
        foreach ($this->rules as $field => $rules)
        {
            foreach ($rules as $rule)
            {
                if(method_exists($this, $rule))
                {
                    if(is_null($this->getError($field)))
                    {
                       $this->$rule($field);
                    }
                    else
                    {
                        throw new \Exception('Unknown validation rule: '.$rule);
                    }
                }
            }
        }
        if(!empty($this->errors))
        {
            return FALSE;
        }
        return TRUE;
    }
    
    public function setTable($table)
    {
        $this->table = $table;
    }
}
