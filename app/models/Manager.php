<?php
class Manager
{
    private $db;
    private $query;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getPharmacyRegistration() {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status='pending'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getApprovedPharmacyRegistration() {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status='approved'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getApprovedSupplierRegistration() {
        $this->db->query("SELECT * FROM supplierregistration WHERE status='approved'");

        $results = $this->db->resultSet();

        return $results;
    }

    

    public function getSupplierRegistration() {
        $this->db->query("SELECT * FROM supplierregistration WHERE status='pending'");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getPharmacyById($id) {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE id = :id");

        // Bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function getSupplierById($id) {
        $this->db->query("SELECT * FROM supplierregistration WHERE id = :id");

        // Bind values
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function approvePharmacy($id) {
        $this->db->query('UPDATE pharmacyregistration SET status = "approved" WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }    

        
    


    public function approveSupplier($id) {
        $this->db->query('UPDATE supplierregistration SET status = "approved" WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
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

    public function countMedicines() {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM regmedicines");
    
        if ($this->query) {
            return $this->query[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
    }
}

    public function countRequests(){
        $sql1 = $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='pending'");
        $sql2 = $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='pending'");
    
        if ($sql1 && $sql2) {
            return $sql1[0]->count + $sql2[0]->count;
           
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
         
}
}

    public function addMedicine(){

        $this->db->query('INSERT INTO regmedicines (medicinename, refno, category, volume, type, description) VALUES(:name, :refno , :category, :volume, :type, :description)');

        // Bind values
        $this->db->bind(':name', $_POST['mname']);
        $this->db->bind(':refno', $_POST['refno']);
        $this->db->bind(':category', $_POST['category']);
        $this->db->bind(':volume', $_POST['volume']);
        $this->db->bind(':type', $_POST['medicineType']);
        $this->db->bind(':description', $_POST['description']);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        
        }
       
    }

    public function getMedicines() {
        $this->db->query("SELECT * FROM regmedicines");

        $results = $this->db->resultSet();

        return $results;
    }

    public function getUserData() {
        $this->db->query("SELECT * FROM managerregistration WHERE id = :id");

        // Bind values
        $this->db->bind(':id', $_SESSION['USER_DATA']['id']);

        $row = $this->db->single();

        return $row;

    }

    public function rejectPharmacy($id)
    {
        $this->db->query('UPDATE pharmacyregistration SET status = "rejected" WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function rejectSupplier($id) {

        $this->db->query('UPDATE supplierregistration SET status = "rejected" WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }

    }

    

}

?>