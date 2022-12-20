<?php


class Slider
{
    public $db;
    public function __construct()
    {
        $this->db=new Database();
    }

    public function store($image_name,$alt,$publish)
    {
        $this->db->query("insert into slider(image,alt,publish)values(:image, :alt, :publish)");
        $this->db->bind('image',$image_name);
        $this->db->bind('alt',$alt);
        $this->db->bind('publish',$publish);
        $this->db->execute();
    }

}