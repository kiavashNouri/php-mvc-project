<?php
class Core{
    protected $currentController="Home";
    protected $currentCMethode="index";
    protected $params=[];

    public function __construct()
    {
        $url=$this->getUrl();


    }
    public function getUrl()
    {

        $url=rtrim($_GET['url'],'/');
        $url=filter_var($url,FILTER_SANITIZE_URL);
        return explode("/",$url); //product/index/10  => [0]=>product,[1]=>index [2]=>10
    }
}