<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace core\base;

/**
 * Description of view
 *
 * @author Silentspec
 */
class view
{
    public $basePath = __DIR__.'/../views/templates/';
    
    protected $title;
    protected $seo = [];
    protected $css = [];
    protected $js = [];
    
    protected $layout;

    public function setLayout($layout)
    {
        $this->layout = __DIR__.'/../views/layout/'.$layout.'.php';
    }

    public function render($tplName=[], $data)
    {
        include $this->layout;
    }
    
    public function setTitle($str)
    {
        $this->title = $str;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setCss($css)
    {
        $this->css[] = $css;
    }
    
    public function setJs($js)
    {
        $this->js[] = $js;
    }
    
    public function getJs()
    {
        return $this->js;
    }
}
