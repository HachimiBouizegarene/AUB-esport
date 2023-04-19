<?php
namespace View;

use Exception;

class View{

    private $_file;
    private $_title;
    private $_css;
    private $_script;


    public function __construct($action, $title, $css, $script="")
    {
        $this->_css = URL."public/css/".$css.".css" ; 
        $this->_file = 'views/View'.$action.'.php';
        $this->_title = $title;
        $this->_script = URL."public/js/".$script.".js";
    }

    public function generate($data){
        $content = $this->generatefile($this->_file, $data);
        $view = $this->generateFile('views/template.php', ['titre'=>$this->_title, 'content'=>$content , "css"=> $this->_css, "script"=>$this->_script]);
        echo $view;
    }

    private function generateFile($file, $data){
        
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }else{
            throw new Exception("Page introuvable view");
        }
    }
}