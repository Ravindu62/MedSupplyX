<?php
/* 
    * PDO Database Class
    * Connect to database
    * Create prepared statements
    * Bind values
    * Return rows and results
*/

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname= DB_NAME;

    private $dbh; //database handler
    private $stmt; //statement
    private $error;
    private$dsn;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname; 
        $options = array(
            PDO::ATTR_PERSISTENT => true, //persistent connection
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //error mode
        );

        // Create PDO instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options); //create PDO instance
        } catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function connect()
    {
      $str ='mysql:host=' . $this->host . ';dbname=' . $this->dbname; 
      $conn = new PDO($str, DB_USER, DB_PASS);
      return $conn;
    }

    public function query2($query, $data = [], $type = 'object')
    {
        $conn = $this->connect();
      $stm = $conn->prepare($query);
      if ($stm) {
        $check = $stm->execute($data);
        if ($check) {
          if ($type == 'object') {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
          } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
          }
          if (is_array($result) && count($result) >0) {
            return $result;
          } else {
            return false;
          }
        }
      }
    }

    // Prepare statement with query
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql); //prepare statement
    }

    

    // Bind values
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value): //if value is integer
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value): //if value is boolean
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value): //if value is null
                    $type = PDO::PARAM_NULL;
                    break;
                default: //if value is string
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type); //bind value
    }
    

    // Execute the prepared statement
    public function execute(){
        return $this->stmt->execute(); //execute statement
    }

    // Get result set as array of objects
    public function resultSet(){
        $this->execute(); //execute statement
        return $this->stmt->fetchAll(PDO::FETCH_OBJ); //fetch all objects
    }

    // Get single record as object
    public function single(){
        $this->execute(); //execute statement
        return $this->stmt->fetch(PDO::FETCH_OBJ); //fetch object
    }

    // Get row count
    public function rowCount(){
        return $this->stmt->rowCount(); //return row count
    }

    
}