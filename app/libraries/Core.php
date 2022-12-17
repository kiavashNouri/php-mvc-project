<?php
class Core{
    protected $currentController="Home";
    protected $currentCMethode="index";
    protected $params=[];

    public function __construct()
    {
        $url=$this->getUrl();
        if (file_exists("../app/controllers/".ucwords($url[0]).".php")) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }else{
            echo "<h2 style='width: 50%; margin: 0 auto'>Not Found Controller (404)</h2>";
        }
        require_once "../app/controllers/".$this->currentController.".php";
        $this->currentController=new $this->currentController(); //Category=new Category()

    }
    public function getUrl()
    {

        $url=rtrim($_GET['url'],'/');
        $url=filter_var($url,FILTER_SANITIZE_URL);
        return explode("/",$url); //product/index/10  => [0]=>product,[1]=>index [2]=>10
    }
}