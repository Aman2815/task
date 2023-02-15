<?php
class DB{

    const Host = "127.0.0.1";
    CONST User = "root";
    CONST Pass = "";
    CONST DB = "product";
    protected $conn;



    
    public function __construct(){
        // Create connection
        $servername = self::Host;
        $username = self::User;
        $password = self::Pass;
        $db = self::DB;
        $conn = new mysqli($servername, $username, $password,$db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // return $conn;
        $this->conn = $conn;

    }
}

?>