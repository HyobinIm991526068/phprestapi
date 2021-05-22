<?php

class Category{
    //add database
    private $conn;
    private $table = 'categories';

    //add post properties
    public $id;
    public $name;
    public $create_date;

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }

    //getting the posts from the database
    public function read(){
        //create query
        $query = 'SELECT * FROM ' . $this->table;
        
        //prepare the statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }
}
?>