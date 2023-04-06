<?php
namespace View;

use Exception;

class View{

    private $_file;
    private $_title;


    public function __construct($action, $title)
    {
        $this->_file = 'views/View'.$action.'.php';
        $this->_title = $title;
    }

    public function generate($data){
        $content = $this->generatefile($this->_file, $data);
        $view = $this->generateFile('views/template.php', ['titre'=>$this->_title, 'content'=>$content]);
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