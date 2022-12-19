<?php


class Products
{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
}