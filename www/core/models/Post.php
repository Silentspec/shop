<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\models;

/**
 * Description of Post
 *
 * @author Silentspec
 */
class Post
{
    public function __construct($id){}
    
    public static function getPost($id)
    {
        $sql = "SELECT id, title, content, pubdate, author_id, author_name, short_content, preview "
                . "FROM posts WHERE id = '{$id}'";
        $row = \core\libs\DataBase::sendQuery($sql)->fetch();
        if(!empty($row))
        {
            return $row;
        }
        return false;
    }
}
