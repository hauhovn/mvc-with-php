<?php 
class DB {
    public $conn;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "coffee_db";
    function __construct() {
      
        try {
            $this->conn = mysqli_connect(
                $this->servername,
                $this->username,
                $this->password);
            mysqli_select_db($this->conn, $this->dbname);
            mysqli_query($this->conn,"SET NAMES 'utf8'");
          }catch (Exception $err){
            echo "Connection failed: " . $$err;
          }
        // try {
        //     $conn = new PDO("mysql:host=".$this->servername.";
        //     dbname=".$this->dbname, $this->username, $this->password);
        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //   } catch(PDOException $e) {
        //     echo "Connection failed: " . $e->getMessage();
        //   }
    }
}
?>