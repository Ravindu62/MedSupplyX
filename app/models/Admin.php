<?php
class Admin{

    private $db;
    protected $table = 'users';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function regManager($data) {
        $this->db->query('INSERT INTO managerregistration (name, email, password, phone, address) VALUES (:name, :email, :password, :phone, :address)');

        // Bind values
        $this->db->bind(':name', $data['mname']);
        $this->db->bind(':email', $data['memail']);
        $this->db->bind(':password', $data['mpassword']);
        $this->db->bind(':phone', $data['mphone']);
        $this->db->bind(':address', $data['maddress']);

         // Execute
         if($this->db->execute()) {
            $this->db->query('INSERT INTO users (name, email, password,role) VALUES(:name,  :email, :password , :role)');

        // Bind values
        $this->db->bind(':name', $data['mname']);
        $this->db->bind(':email', $data['memail']);
        $this->db->bind(':password', $data['mpassword']);
        $this->db->bind(':role', 'manager');
        if($this->db->execute()) {
            return true;
          
        }
        } else {
            return false;
        }
    }
    

    public function findManagerByEmail($email){
        $this->db->query('SELECT * FROM managerregistration WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getManager() {
        $this->db->query('SELECT * FROM managerregistration');
        $results = $this->db->resultSet();
        return $results;

        
    }

    public function countPharmacies() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='approved'");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
                }
    }


    public function countSuppliers() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='approved'");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }
      
}

    public function countManagers() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM managerregistration");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }
}

   /* public function countMessages(){
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM messages");
        
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }

         
}*/
}


    
