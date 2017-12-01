<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\models;

/**
 * Description of Posts
 *
 * @author Silentspec
 */
class Posts
{
    public function __construct() {}
    
    public static function getAllPosts()
    {
        if(!file_exists('core/config/blogconf.php'))
        {
            throw new \Exception('Blog config not found!');
        }
        $config = require_once 'core/config/blogconf.php';
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT {$config['Max_posts_on_page']}";
        $res = \core\libs\DataBase::sendQuery($sql);
        $i=0;
        while($row = $res->fetch())
        {
            $data[$i]['id'] = $row['id'];
            $data[$i]['title'] = $row['title'];
            $data[$i]['content'] = $row['content'];
            $data[$i]['short_content'] = $row['short_content'];
            $data[$i]['preview'] = $row['preview'];
            $data[$i]['pubdate'] = $row['pubdate'];
            $data[$i]['author_name'] = $row['author_name'];
            $data[$i]['author_id'] = $row['author_id'];
            $i++;
        }
        return $data;
    }
}