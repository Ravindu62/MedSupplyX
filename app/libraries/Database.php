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