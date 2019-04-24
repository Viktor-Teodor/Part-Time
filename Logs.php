<?php
class Logs{
 
    // database connection and table name
    private $conn;
    private $table_name = "logs";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $message;
	public $modified;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read products
	public function read(){
	 
		// select all query
		$query = "SELECT *
		FROM  " . $this->table_name."
		ORDER BY modified DESC";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
	
	// create product
	public function create(){
	 
	 	// sanitize
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->description=htmlspecialchars(strip_tags($this->description));
		$this->message=htmlspecialchars(strip_tags($this->message));
		$this->category_id=htmlspecialchars(strip_tags($this->modified));
		
		// query to insert record
		$query = "INSERT INTO
					logs
				SET
					name='".$this->name."',description='".$this->description."'
					,message='".$this->message."',modified='".$this->modified."'";

		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		
		// bind values
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":description", $this->description);
		$stmt->bindParam(":category_id", $this->modified);
		
	
		// execute query
		if($stmt->execute()){
			return true;
		}
		return false;
	}
}