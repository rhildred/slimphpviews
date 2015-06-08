<?php

namespace PHPView;

class PHPView extends \Slim\View{
    private $sPage;
    protected function render($template, $data = null){
        $this->sPage = $template;
        $Viewbag = $this->data;
        try{
            include $this->getTemplatesDirectory() . '/' . $template;
        }catch(\Exception $e){}
    }
    private $bInLayout = FALSE;
    protected function layout($template){
        if(!$this->bInLayout){
            $this->bInLayout = TRUE;
            include $this->getTemplatesDirectory() . '/' . $template;
            throw new \Exception("Don't print twice");
        }
    }
    protected function renderBody(){
        include $this->getTemplatesDirectory() . '/' . $this->sPage;
    }
    protected function urlFor($name){
        return preg_replace("/index.php(.*)$/", "index.php/" . $name, $_SERVER["PHP_SELF"]);
    }
}

?>
