<?php


class Home extends controller
{
    public function index()
    {
        return $this->view('home/index');
    }
}