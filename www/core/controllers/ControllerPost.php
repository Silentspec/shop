<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\controllers;

/**
 * Description of ControllerPost
 *
 * @author Silentspec
 */
class ControllerPost extends \core\base\Controller
{
    /**
     * All posts
     */
    public function actionIndex()
    {
        $model = \core\models\Posts::getAllPosts();
        $this->view->setTitle('All posts');
        $this->view->render(['header'=>'header','nav'=>'nav','sidenav'=>'side_menu','section'=>'all_posts','footer'=>'footer'],['model' => $model]);
    }
    
    /**
     * Create new post
     * @throws core\libs\HTTPException
     */
    public function actionCreate()
    {
        if(!\core\libs\Auth::isGuest())
        {
            $model = new \core\models\PostForm();
            if(\core\libs\Request::isPost())
            {
                if($model->load(\core\libs\Request::getPost()) && $model->validate())
                {
                    if($model->savePost())
                    {
                        header('Location: /post/view/'.$model->id);
                    }
                }
            }
            $this->view->render(['header'=>'header','nav'=>'nav','sidenav'=>'side_menu','section'=>'post_form','footer'=>'footer'],['model' => $model]);
        }
        else
        {
            throw new core\libs\HTTPException('Forbidden','403');
        }
    }
    
    /**
     * View the post
     */
    public function actionView()
    {
        $model = \core\models\Post::getPost(\core\libs\Url::getSegment(2));
        $this->view->render(['header'=>'header','nav'=>'nav','sidenav'=>'side_menu','section'=>'post_view','footer'=>'footer'],['model'=>$model]);
    }
    
    /**
     * Edit post
     * @throws core\libs\HTTPException
     */
    public function actionEdit()
    {
        if(!\core\libs\Auth::isGuest())
        {
            $postId = \core\libs\Url::getSegment(2);
            $post = new \core\models\Post($postId);
            $model = new \core\models\PostForm();
            $model->id = $post->id;
            $model->title = $post->title;
            $model->content = $post->content; 
            if(\core\libs\Request::isPost())
            {
                if($model->load(\core\libs\Request::getPost()) && $model->validate())
                {
                    if($model-updatePost())
                    {
                        header('Location: /post/view/'.$model->id);
                    }
                }
            }
            $this->view->render(['header'=>'header','nav'=>'nav','sidenav'=>'side_menu','section'=>'post_form','footer'=>'footer'],['model' => $model]);
        }
        else
        {
            throw new core\libs\HTTPException('Forbidden','403');
        }
    }
    
    /**
     * Delete post
     * @throws core\libs\HTTPException
     */
    public function actionDelete()
    {
        if(!\core\libs\Auth::isGuest())
        {
            
        }
        else
        {
            throw new core\libs\HTTPException('Forbidden','403');
        }
    }
}
