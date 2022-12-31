<?php

class Database
{
    private $localhost = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $db = DB_NAME;
//    database handler
    private $dbh;
    private $stmt;
    private $error;


    public function __construct()
    {
        try {
            $this->dbh = new PDO("mysql:host=$this->localhost;dbname=$this->db", $this->user, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
//            echo "error: " . $e->getMessage() . "<br>";

        }

    }

    public function query($sql)
    {

//        select * from slider  where id=:id

        $this->stmt = $this->dbh->prepare($sql);

    }

    public function bind($params, $value)
    {
        $this->stmt->bindParam($params, $value);

    }

    public function execute()
    {
        $this->stmt->execute();

    }

    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch();

    }

    public function rowCount()
    {
        return $this->stmt->rowCount();

    }
}
