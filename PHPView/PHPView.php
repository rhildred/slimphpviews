<?php

namespace PHPView;

class PHPView extends \Slim\View{
    
    // override for Slim
    private $sPage;
    protected function render($template, $data = null){
        $this->sPage = $template;
        try{
            include $this->getTemplatesDirectory() . '/' . $template;
        }catch(\Exception $e){}
    }

    // helper method so that we can have a layout
    private $bInLayout = FALSE;
    protected function layout($template){
        if(!$this->bInLayout){
            $this->bInLayout = TRUE;
            include $this->getTemplatesDirectory() . '/' . $template;
            throw new \Exception("Don't print twice");
        }
    }

    // helper method to render te original page inside the layout
    protected function renderBody(){
        include $this->getTemplatesDirectory() . '/' . $this->sPage;
    }

    // helper method to create urls given slim routing
    protected function urlFor($name){
        if(preg_match("/\.(.*)s$/", $name)){
            return preg_replace("/index.php(.*)$/", $name, $_SERVER["PHP_SELF"]);            
        }else{
            return preg_replace("/index.php(.*)$/", "index.php/" . $name, $_SERVER["PHP_SELF"]);
        }
    }
}

?>
