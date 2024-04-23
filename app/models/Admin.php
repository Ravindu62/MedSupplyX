<?php
class Admin{

    private $db;
    private $query;
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

    public function getManagerById($id) {
        $this->db->query("SELECT * FROM managerregistration WHERE id = :id");
    
        // Bind values
        $this->db->bind(':id', $id);
    
        $row = $this->db->single();
    
        return $row;
    }
    


    public function deleteManager($id)
    {
        $this->db->query('DELETE FROM managerregistration WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function updateManager($id, $name, $address, $phone) {
        $this->db->query('UPDATE managerregistration SET name = :name, address = :address, phone = :phone WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':address', $address);
        $this->db->bind(':phone', $phone);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
    public function getPharmacyRegistration() {
        $this->db->query("SELECT * FROM pharmacyregistration");

        $results = $this->db->resultSet();

        return $results;
    }

    public function approvedPharmacy(){
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status = 'approved'");
        $results = $this->db->resultSet();
        return $results;
    }

    public function pendingPharmacy(){
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status = 'pending'");
        $results = $this->db->resultSet();
        return $results;
    }

    public function rejectedPharmacy(){
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status = 'rejected'");
        $results = $this->db->resultSet();
        return $results;

    }

    public function getSupplierRegistration() {
        $this->db->query("SELECT * FROM supplierregistration");

        $results = $this->db->resultSet();

        return $results;
    }

    public function approvedSupplier(){
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'approved'");
        $results = $this->db->resultSet();
        return $results;
    }

    public function pendingSupplier(){
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'pending'");
        $results = $this->db->resultSet();
        return $results;
    }

    public function rejectedSupplier(){
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'rejected'");
        $results = $this->db->resultSet();
        return $results;

    }

    public function medicines() {
        $this->db->query("SELECT * FROM regmedicines");

        $results = $this->db->resultSet();

        return $results;
    }


    public function countPharmacies() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
                }
    }

    public function countapprovedPharmacies() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='approved'");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
                }
    }
    public function countpendingPharmacies() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='pending'");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
                }
    }

    public function countrejectedPharmacies() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='rejected'");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
                }
    }

    public function countSuppliers() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }
      
}
    public function countapprovedSuppliers() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='approved'");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }
      
}
public function countpendingSuppliers() {
    $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='pending'");

    if ($this->query) {
        return $this->query[0]->count;
       
    } else {
        // Handle the error, e.g., log it or return an appropriate value
        return 0;
}
  
}
public function countrejectedSuppliers() {
    $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='rejected'");

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

public function countOrders() {
    $this->query = $this->db->query2("SELECT COUNT(*) as count FROM approvedorders");

    if ($this->query) {
        return $this->query[0]->count;
       
    } else {
        // Handle the error, e.g., log it or return an appropriate value
        return 0;
}
}

public function countMedicines() {
    $this->query = $this->db->query2("SELECT COUNT(*) as count FROM regmedicines");

    if ($this->query) {
        return $this->query[0]->count;
       
    } else {
        // Handle the error, e.g., log it or return an appropriate value
        return 0;
}
}
    public function countMessages(){
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM messages");
        
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }    
}

public function getMessages()
{
    $this->db->query("SELECT * FROM messages");

    $results = $this->db->resultSet();

    return $results;
}

public function addMessage($data)
{
    $this->db->query('INSERT INTO messages (id, sender, receiver, heading, message) VALUES(:id, :sender, :receiver, :heading, :message)');
    // Bind values
    $this->db->bind(':id', $_SESSION['USER_DATA']['id']);
    $this->db->bind(':sender', $data['sender']);
    $this->db->bind(':receiver', $data['receiver']);
    $this->db->bind(':heading', $data['heading']);
    $this->db->bind(':message', $data['message']);

    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}


    public function getProfile() {
        $this->db->query('SELECT * FROM admin');
        $results = $this->db->resultSet();
        return $results;
    }


    public function updateContactNumber($currentContactNumber, $newContactNumber)
    {
        $this->db->query('UPDATE admin SET phone = :newContactNumber WHERE phone = :currentContactNumber');
        $this->db->bind(':newContactNumber', $newContactNumber);
        $this->db->bind(':currentContactNumber', $currentContactNumber);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateEmail($currentEmail, $newEmail) {
        $this->db->query('UPDATE admin SET email = :new_email WHERE email = :current_email');
        $this->db->bind(':new_email', $newEmail);
        $this->db->bind(':current_email', $currentEmail);
    
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // Find admin by email
    public function findAdminByEmail($email) {
        $this->db->query('SELECT * FROM admin WHERE email = :email');
        $this->db->bind(':email', $email);
    
        $row = $this->db->single();
    
        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    public function updatePassword($id, $newPassword) {
        
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $this->db->query('UPDATE admin SET password = :password WHERE id = :id');
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':id', $id);
    
        if ($this->db->execute()) {
            return true; 
        } else {
            return false; 
        }
    }

}
    








    
