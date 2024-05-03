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
        $this->db->query('INSERT INTO regmedicines (medicinename, refno, category, volume, type, description, manufacturedDate) VALUES(:name, :refno , :category, :volume, :type, :description, :manufacturedDate)');
        // Bind values

        $this->db->bind(':name', $data['mname']);
        $this->db->bind(':refno', $data['refno']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['medicineType']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
      

        // Execute
        if ($this->db->execute()) {
            $medicineId = $this->db->query('SELECT medicineId FROM regmedicines WHERE medicinename = :name AND refno = :refno AND category = :category AND volume = :volume AND type = :type AND description = :description AND manufacturedDate = :manufacturedDate');

            $this->db->bind(':name', $data['mname']);
            $this->db->bind(':refno', $data['refno']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':volume', $data['volume']);
            $this->db->bind(':type', $data['medicineType']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':manufacturedDate', $data['manufacturedDate']);

            $medicineId = $this->db->single();
            $this->registerBrand($medicineId->medicineId, $data['brand']);
            return true;
        } else {
            return false;
        }

      
    }
    public function registerBrand($medicineId, $brandname)
    {
        $this->db->query('INSERT INTO medicinebrands (medicineId, brandname) 
        VALUES(:medicineId, :brandname)');
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
        $this->db->query("SELECT * FROM managerregistration WHERE id = (SELECT userId FROM users WHERE id = :id)");

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

    




//changes

    public function isMedicineAvailable($medicineName, $volume, $type)
    {
        //check whether the medicine is already registered
        $this->db->query("SELECT * FROM regmedicines WHERE medicinename = :name AND volume = :volume AND type = :type");
        // Bind values
        $this->db->bind(':name', $medicineName);
        $this->db->bind(':volume', $volume);
        $this->db->bind(':type', $type);
      
        $row = $this->db->single();
        return $row;
    }

    public function getUserIdbyid($id)
    {
        $this->db->query("SELECT userId FROM users WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function checkOldPassword($id)
    {
        $this->db->query("SELECT password FROM users WHERE id = :id");
        // Bind values
        $this->db->bind(':id', $id);
      
        $row = $this->db->single();
        return $row;
    }

    public function isEmailAvailable($email)
    {
        //check whether the email is already registered
        $this->db->query("SELECT * FROM users WHERE email = :email");
        // Bind values
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        return $row;
    }

    public function updateProfile($data)
    {
        $this->db->query('UPDATE users AS u
        JOIN managerregistration AS mr ON u.userId = mr.id
        SET u.email = :email, u.password = :password,
            mr.email = :email, mr.password = :password
        WHERE u.id = :id;
        ');
        
        // Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['newpassword']);
        $this->db->bind(':id', $data['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function updatePassword($data)
    {
        // Query to update the userId in the users table
        $query1 = 'UPDATE users SET userId = (SELECT id FROM managerregistration WHERE email = :email)
                    WHERE id = :id';
        // Prepare and bind parameters for the first query
        $this->db->query($query1);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':email', $data['getUserData']->email);
        // Execute the first query
        $query1Result = $this->db->execute();
    
        if ($query1Result) {
            // Query to update the email and password in both tables
            $query2 = 'UPDATE users AS u
            JOIN managerregistration AS mr ON u.userId = mr.id
            SET u.password = :password,
                mr.password = :password
            WHERE u.id = :id';
            // Prepare and bind parameters for the second query
            $this->db->query($query2);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':password', $data['newpassword']);
            // Execute the second query
            return $this->db->execute();
        } else {
            return false; // Return false if query 1 fails
        }
    }
    

public function getChangePasswordData()
{
    $this->db->query("SELECT * FROM users WHERE id = :id");
    // Bind values
    $this->db->bind(':id', $_SESSION['USER_DATA']['id']);
    $row = $this->db->single();
    return $row;
}

public function getSearchMedicine($searchTerm){
    
   
    $this->db->query("SELECT * FROM regmedicines WHERE medicinename LIKE '$searchTerm%' ORDER BY medicinename ASC");
    $results = $this->db->resultSet();
    
    // Return the results
    return $results;
}


public function getMessageDataById($id)
{
    $this->db->query("SELECT * FROM messages WHERE id = :id");
    // Bind values
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
}

public function sendMessage($data)
{
    $this->db->query('INSERT INTO messages (managerId, pharmacyId, sender, receiver, heading, message) 
                                    VALUES(:managerId, :pharmacyId, :sender, :receiver, :heading, :message)');
    // Bind values
    $this->db->bind(':managerId', $data['id']);
    $this->db->bind(':pharmacyId', $data['pharmacyId']);
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

public function newMessage($data) {

    $this->db->query('INSERT INTO messages (managerId, sender, receiver, heading, message) 
                                    VALUES(:managerId, :sender, :receiver, :heading, :message)');

    // Bind values
    $this->db->bind(':managerId', $data['managerId']);
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

public function getMyMessageData()
{
    $this->db->query("SELECT * FROM messages WHERE sender = :sender ORDER BY createdDate DESC");
    // Bind values
    $this->db->bind(':sender', $_SESSION['USER_DATA']['name']);
    $results = $this->db->resultSet();
    return $results;

}

public function getPharmacyById2($id)
{
    $this->db->query("SELECT * FROM pharmacyregistration WHERE id = :id");
    // Bind values
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
}

public function deletePharmacy($data)
{

    $query1 = 'UPDATE pharmacyregistration SET reason = :reason WHERE id = :id';
    $this->db->query($query1);
    $this->db->bind(':reason', $data['reason']);
    $this->db->bind(':id', $data['id']);

    $query1Result = $this->db->execute();


    if ($query1Result) {

        $query2 = 'UPDATE pharmacyregistration SET status = "rejected" WHERE id = :id';
        $this->db->query($query2);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    } else {
        return false;
    }   

}

public function getSupplierById2($id)
{
    $this->db->query("SELECT * FROM supplierregistration WHERE id = :id");
    // Bind values
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
}

public function deletesupplier($data)
{

    $query1 = 'UPDATE supplierregistration SET reason = :reason WHERE id = :id';
    $this->db->query($query1);
    $this->db->bind(':reason', $data['reason']);
    $this->db->bind(':id', $data['id']);

    $query1Result = $this->db->execute();


    if ($query1Result) {

        $query2 = 'UPDATE supplierregistration SET status = "deleted" WHERE id = :id';
        $this->db->query($query2);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    } else {
        return false;
    }

}
}
