<?php

class Post{
    //add database
    private $conn;
    private $table = 'posts';

    //add post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $create_date;

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }

    //getting the posts from the database
    public function read(){
        //create query
        $query = 'SELECT
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.create_date
            FROM 
            ' .$this->table . ' p 
            LEFT JOIN
                categories c ON p.category_id = c.id
                ORDER BY p.create_date DESC';
        
        //prepare the statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_one(){
        $query = 'SELECT
        c.name as category_name,
        p.id,
        p.category_id,
        p.title,
        p.body,
        p.author,
        p.create_date
        FROM 
        ' .$this->table . ' p 
        LEFT JOIN
            categories c ON p.category_id = c.id
            WHERE p.id = ? LIMIT 1';

        //prepare the statement
        $stmt = $this->conn->prepare($query);

        //binding param
        $stmt->bindParam(1, $this->id);

        //executing the query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->body = $row['body'];
        $this->author = $row['author'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }
}

?>