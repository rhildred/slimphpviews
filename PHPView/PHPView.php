<?php

namespace PHPView;

class PHPView extends \Slim\View{
    private $sPage;
    protected function render($template, $data = null){
        $this->sPage = $template;
        $Viewbag = $this->data;
        include($this->getTemplatesDirectory() . '/' . $template);
    }
    private $bInLayout = FALSE;
    protected function layout($template){
        if(!$this->bInLayout){
            $this->bInLayout = TRUE;
            include($this->getTemplatesDirectory() . '/' . $template);
            exit;
        }
    }
    protected function renderBody(){
        include($this->getTemplatesDirectory() . '/' . $this->sPage);
    }
}

?>
