<?php
class Core{
    protected $currentController="Home";
    protected $currentMethode="index";
    protected $params=[];

    public function __construct()
    {
        $url=$this->getUrl();
        if (file_exists("../app/controllers/".ucwords($url[0]).".php")) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }else{
            $this->currentController="NotFound";
        }
        require_once "../app/controllers/".$this->currentController.".php";
        $this->currentController=new $this->currentController(); //Category=new Category()

        if (isset($url[1])){
          if (method_exists($this->currentController,$url[1])) {
              $this->currentMethode = $url[1];
              unset($url[1]);
          }
        }

        $this->params=$url?array_values($url):[];
        call_user_func_array([$this->currentController,$this->currentMethode],$this->params);

    }
    public function getUrl()
    {

        $url=rtrim($_GET['url'],'/');
        $url=filter_var($url,FILTER_SANITIZE_URL);
        return explode("/",$url); //product/index/10  => [0]=>product,[1]=>index [2]=>10
    }
}