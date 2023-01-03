<?php


class Dashboard
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function store($data)
    {
        $this->db->query("insert into panel (image, title,link) values (:image, :title, :link)");

        $this->db->bind(":image",$data['image']);
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":link",$data['link']);
        $this->db->execute();
    }

    public function selectAll()
    {
        $this->db->query("SELECT * FROM panel");
        return $this->db->fetchAll();
    }

    public function selectId($id)
    {
        $this->db->query("SELECT * FROM panel where id=:id");
        $this->db->bind(':id',$id);
        return $this->db->fetch();

    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM panel WHERE id=:id");
        $this->db->bind(':id',$id);
        $this->db->execute();
    }


    public function update($data)
    {
        $this->db->query("UPDATE panel SET image=:image,title=:title,link=:link where id=:id");
        $this->db->bind('image',$data['image']);
        $this->db->bind('title',$data['title']);
        $this->db->bind('link',$data['link']);
        $this->db->bind('id',$data['id']);
        $this->db->execute();
    }


}