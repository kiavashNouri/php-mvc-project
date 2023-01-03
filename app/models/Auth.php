<?php


class Auth
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data)
    {
        $row=$this->db->rowCount();
        $this->db->query("INSERT INTO auth(fullname,email,password)VALUES(:fullName,:email,:password)");
        $this->db->bind(':fullName',$data['fullName']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        $this->db->execute();
        $rowNew =$this->db->rowCount();
        if ($rowNew>$row){
            return true;
        }else{
            return false;
        }


    }

    public function findUserEmail($data)
    {
        $this->db->query("select * from auth where email=:email");
        $this->db->bind(':email',$data['email']);
        $this->db->fetch();
        if ($this->db->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }


    public function login($data)
    {
        $this->db->query("SELECT * FROM auth WHERE email=:email");
        $this->db->bind(':email',$data['email']);
        $auth=$this->db->fetch();
        if (password_verify($data['password'],$auth->password)){
            return $auth;
        }else{
            return false;
        }
    }

}