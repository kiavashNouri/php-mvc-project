<?php


class Seoes extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('seo/create');
    }
}