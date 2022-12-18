<?php


class NotFound extends Controller
{
    public function index()
    {
        return $this->view('error/404');
    }

}