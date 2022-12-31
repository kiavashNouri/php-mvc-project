<?php


class Slider
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function store($image_name, $alt, $publish)
    {
        $this->db->query("insert into slider(image,alt,publish)values(:image, :alt, :publish)");
        $this->db->bind('image', $image_name);
        $this->db->bind('alt', $alt);
        $this->db->bind('publish', $publish);
        $this->db->execute();
    }

    public function fetchAll()
    {
        $this->db->query("select * from slider");
        return $this->db->fetchAll();
    }

    public function fetch($id)
    {
        $this->db->query("select * from slider where id=:id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

    public function delete($id)
    {
        $this->db->query("delete from slider where id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }

}