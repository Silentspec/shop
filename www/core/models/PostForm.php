<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\models;

/**
 * Description of PostForm
 *
 * @author Silentspec
 */
class PostForm extends \core\base\BaseForm
{
    public $title;
    public $content;
    public $id;

    protected $tableName = 'posts';
    
    public function getRules()
    {
        return 
        [
            'title'=>['required','unique'],
            'content'=>['required']
        ];
    }
    
    public function savePost()
    {
        $author_id = \core\libs\Auth::getUserId();
        if(!isset($author_id))
        {
            throw new \Exception('You must login to add the post');
        }
        $author_name = \core\libs\Auth::getUserLogin();
        $sql = "INSERT INTO {$this->tableName} (title,content,author_id,author_name) VALUES ('{$this->title}','{$this->content}','{$author_id}','{$author_name}')";
        $row = \core\libs\DataBase::sendQuery($sql)->fetch();
        if(!$row)
        {
            $this->errors['saveErros'] = 'Error!';
            return FALSE;
        }
        $this->id = \core\libs\DataBase::getLastInsertId();
        return TRUE;
    }
    
    public function updatePost()
    {
        $sql = "UPDATE {$this->tableName} SET title = '{$this->title}', content = '{$this->content}' WHERE id = {$this->id}";
        $res = \core\libs\DataBase::sendQuery($sql)->fetch();
        if(!$res)
        {
            $this->errors['saveErros'] = 'Error!';
            return FALSE;
        }
        $this->id = $res['id'];
        return TRUE;
    }
    
    public function deletePost()
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = {$this->id}";
        $res = \core\libs\DataBase::sendQuery($sql)->fetch();
        if(!$res)
        {
            $this->errors['saveErros'] = 'Error!';
            return FALSE;
        }
        $this->id = $res['id'];
        return TRUE;
    }
}
