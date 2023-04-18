<?php


class Category
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function store($data)
    {
        $this->db->query("INSERT INTO category(image,title,description,alt) VALUES(:image,:title,:description,:alt)");
        $this->db->bind(":image",$data['image']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":description",$data['description']);
        $this->db->bind(":alt",$data['alt']);
        $this->db->execute();
    }

    public function selectAll()
    {
        $this->db->query("SELECT * FROM category");
        return $this->db->fetchAll();
    }
}