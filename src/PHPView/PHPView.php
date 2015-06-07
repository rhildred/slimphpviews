<?php
    
namespace PHPView;

class PHPView extends \Slim\View{
    protected function render($template, $data = null){
        $Viewbag = $this->data;
        include($this->getTemplatesDirectory() . '/' . $template);
    }
}

?>
