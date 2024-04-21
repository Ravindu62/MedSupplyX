<?php
class Manager
{
    private $db;
    private $query;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPharmacyRegistration()
    {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status='pending'");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getApprovedPharmacyRegistration()
    {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status='approved'");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getApprovedSupplierRegistration()
    {
        $this->db->query("SELECT * FROM supplierregistration WHERE status='approved'");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getSupplierRegistration()
    {
        $this->db->query("SELECT * FROM supplierregistration WHERE status='pending'");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPharmacyById($id)
    {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function getSupplierById($id)
    {
        $this->db->query("SELECT * FROM supplierregistration WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function approvePharmacy($id)
    {
        $this->db->query('UPDATE pharmacyregistration SET status = "approved" WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function approveSupplier($id)
    {
        $this->db->query('UPDATE supplierregistration SET status = "approved" WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function countPharmacies()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='approved'");
        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countSuppliers()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='approved'");
        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countMedicines()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM regmedicines");
        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countRequests()
    {
        $sql1 = $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='pending'");
        $sql2 = $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='pending'");
        if ($sql1 && $sql2) {
            return $sql1[0]->count + $sql2[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function addMedicine($data)
    {
        $this->db->query('INSERT INTO regmedicines (medicinename, refno, category, volume, type, description) VALUES(:name, :refno , :category, :volume, :type, :description)');
        // Bind values
        $this->db->bind(':name', $data['mname']);
        $this->db->bind(':refno', $data['refno']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['medicineType']);
        $this->db->bind(':description', $data['description']);
        // Execute
        if ($this->db->execute()) {
            $medicineId = $this->db->query('SELECT medicineId FROM regmedicines WHERE medicinename = :name AND refno = :refno AND category = :category AND volume = :volume AND type = :type AND description = :description');
            $this->db->bind(':name', $data['mname']);
            $this->db->bind(':refno', $data['refno']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':volume', $data['volume']);
            $this->db->bind(':type', $data['medicineType']);
            $this->db->bind(':description', $data['description']);
            $medicineId = $this->db->single();
            $this->registerBrand($medicineId->medicineId, $data['brand']);
            return true;
        } else {
            return false;
        }
    }
    public function registerBrand($medicineId, $brandname)
    {
        $this->db->query('INSERT INTO medicinebrands (medicineId, brandname) VALUES(:medicineId, :brandname)');
        // Bind values
        $this->db->bind(':medicineId', $medicineId);
        $this->db->bind(':brandname', $brandname);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getMedicines()
    {
        $this->db->query("SELECT * FROM regmedicines ORDER BY medicinename ASC");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getMedicineBrandsByMedicineId()
    {
        //get available medicine brands grouped by medicine id
        $this->db->query("SELECT * FROM medicinebrands");
        $results = $this->db->resultSet();
        return $results;
    }
    public function getMedicineByName($name)
    {
        $this->db->query("SELECT * FROM regmedicines WHERE medicinename = :name");
        // Bind values
        $this->db->bind(':name', $name);
        $row = $this->db->single();
        return $row;
    }
    public function getUserData()
    {
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
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function rejectSupplier($id)
    {
        $this->db->query('UPDATE supplierregistration SET status = "rejected" WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getMedicineIdByName($name)
    {
        $this->db->query("SELECT * FROM regmedicines WHERE medicinename = :name");
        // Bind values
        $this->db->bind(':name', $name);
        $row = $this->db->single();
        return $row;
    }
    public function addBrand($data)
    {
        $this->db->query('INSERT INTO medicinebrands (medicineId, brandname) VALUES(:medicineId, :brandname)');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':brandname', $data['brandname']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function isBrandAvailable($id, $name)
    {
        //check whether the brand is already registered
        $this->db->query("SELECT * FROM medicinebrands WHERE medicineId = :id AND brandname = :name");
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $row = $this->db->single();
        return $row;
    }
    public function getMedicineById($id)
    {
        $this->db->query("SELECT * FROM regmedicines WHERE medicineId = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    
    public function getMessageDetailsByReceiver($receiver)
    {
        $this->db->query("SELECT * FROM messages WHERE receiver = :receiver");
        // Bind values
        $this->db->bind(':receiver', $receiver);
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function getMessages()
    {
        $this->db->query("SELECT * FROM messages WHERE receiver = 'manager' ORDER BY createdDate DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    
}
