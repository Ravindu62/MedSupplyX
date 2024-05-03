<?php
class Admin
{

    private $db;
    private $query;
    protected $table = 'users';

    public function __construct()
    {
        $this->db = new Database;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Dashboard Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function getPharmacyRegistration()
    {
        // Select all records from the pharmacyregistration table
        $this->db->query("SELECT * FROM pharmacyregistration");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function approvedPharmacy()
    {
        // Select records from pharmacyregistration where status is 'approved'
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status = 'approved'");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function pendingPharmacy()
    {
        // Select records from pharmacyregistration where status is 'pending'
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status = 'pending'");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function rejectedPharmacy()
    {
        // Select records from pharmacyregistration where status is 'rejected'
        $this->db->query("SELECT * FROM pharmacyregistration WHERE status = 'rejected'");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function getSupplierRegistration()
    {
        // Select all records from the supplierregistration table
        $this->db->query("SELECT * FROM supplierregistration");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function approvedSupplier()
    {
        // Select records from supplierregistration where status is 'approved'
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'approved'");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function pendingSupplier()
    {
        // Select records from supplierregistration where status is 'pending'
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'pending'");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function rejectedSupplier()
    {
        // Select records from supplierregistration where status is 'rejected'
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'rejected'");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function medicines()
    {
        // Select all records from the regmedicines table
        $this->db->query("SELECT * FROM regmedicines");
        // Fetch and return the result set
        $results = $this->db->resultSet();
        return $results;
    }

    public function countPharmacies()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countapprovedPharmacies()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='approved'");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countpendingPharmacies()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='pending'");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countrejectedPharmacies()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM pharmacyregistration WHERE status='rejected'");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countSuppliers()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countapprovedSuppliers()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='approved'");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countpendingSuppliers()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='pending'");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }
    public function countrejectedSuppliers()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM supplierregistration WHERE status='rejected'");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countManagers()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM managerregistration");

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countOrders()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM bidTable WHERE status='approved'");

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
    public function countMessages()
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM messages");


        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Manager Registration /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function regManager($data)
    {
         // Insert manager details into the managerregistration table
        $this->db->query('INSERT INTO managerregistration (name, email, password, phone, address) VALUES (:name, :email, :password, :phone, :address)');

        // Bind values
        $this->db->bind(':name', $data['mname']);
        $this->db->bind(':email', $data['memail']);
        $this->db->bind(':password', $data['mpassword']);
        $this->db->bind(':phone', $data['mphone']);
        $this->db->bind(':address', $data['maddress']);

        // Execute
        if ($this->db->execute()) {
            // manager registration is successful
            $this->db->query('INSERT INTO users (name, email, password,role) VALUES(:name,  :email, :password , :role)');

            // Bind values
            $this->db->bind(':name', $data['mname']);
            $this->db->bind(':email', $data['memail']);
            $this->db->bind(':password', $data['mpassword']);
            $this->db->bind(':role', 'manager');
            if ($this->db->execute()) {
                return true; // Return true if both inserts are successful
            }
        } else {
            return false;// Return false if any insert fails
        }
    }


    public function findManagerByEmail($email)
    {
        // Find a manager in the managerregistration table by email
        $this->db->query('SELECT * FROM managerregistration WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);

        // Get a single row
        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;// Return true if a manager with the given email exists
        } else {
            return false;// Return false if no manager with the given email exists
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Managers /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function getManager()
    {
        $this->db->query('SELECT * FROM managerregistration');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getManagerById($id)
    {
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
        if ($this->db->execute()) {
            return true; // Return true if deletion is successful
        } else {
            return false;// Return false if deletion fails
        }
    }

    public function updateManager($id, $name, $address, $phone)
    {
        $this->db->query('UPDATE managerregistration SET name = :name, address = :address, phone = :phone WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $name);
        $this->db->bind(':address', $address);
        $this->db->bind(':phone', $phone);
        // Execute
        if ($this->db->execute()) {
            return true;// Return true if update is successful
        } else {
            return false;// Return false if update fails
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Messages/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function getInboxMessages()
    {
        //get the mess
        $this->db->query("SELECT * FROM messages WHERE receiver = :receiver");
        $this->db->bind(':receiver', 'admin'); // Assuming 'admin' is the value you want to filter by

        $results = $this->db->resultSet();

        return $results;
    }

    public function getSentMessages()
    {
        //get the messages
        $this->db->query("SELECT * FROM messages WHERE sender = :sender");
        $this->db->bind(':sender', 'admin');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getPharmacyList()
    {
        $this->db->query("SELECT * FROM pharmacyregistration");
        $results = $this->db->resultSet();
        return $results;
    }


    public function getPharmacyMessageById($id)
    {
        $this->db->query('SELECT id FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getPharmacyByUserId($id)
    {
        $this->db->query('SELECT id FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getPharmacyDetails($id)
    {
        $this->db->query('SELECT * FROM pharmacyregistration WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getSupplierList()
    {
        $this->db->query("SELECT * FROM supplierregistration");
        $results = $this->db->resultSet();
        return $results;
    }


    public function getSupplierMessageById($id)
    {
        $this->db->query('SELECT id FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getSupplierByUserId($id)
    {
        $this->db->query('SELECT id FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getSupplierDetails($id)
    {
        $this->db->query('SELECT * FROM supplierregistration WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function sendMessage($data)
    {
        $this->db->query('INSERT INTO messages (sender, receiver, heading, message) VALUES( :sender, :receiver, :heading, :message)');
        // Bind values
        // $this->db->bind(':adminId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':sender', $_SESSION['USER_DATA']['email']);
        $this->db->bind(':receiver', $data['receiver']);
        $this->db->bind(':heading', $data['topic']);
        $this->db->bind(':message', $data['description']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;// Return false if deletion fails
        }
    }

    public function addMessage($data)
    {
        $this->db->query('INSERT INTO messages (sender, receiver, heading, message) VALUES( :sender , :receiver, :heading, :message)');
        // Bind values
        // $this->db->bind(':adminId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':sender', $_SESSION['USER_DATA']['name']);
        $this->db->bind(':receiver', $data['receiver']);
        $this->db->bind(':heading', $data['heading']);
        $this->db->bind(':message', $data['message']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;// Return false if update fails
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Profile /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getProfile()
    {
        // Retrieve the profile data for the admin
        $this->db->query('SELECT * FROM admin');
        $results = $this->db->single();// Assuming there is only one admin profile
        return $results; // Return the data
    }



    public function updateContactNumber($currentContactNumber, $newContactNumber)
    {   
        // Update the contact number for the admin 
        $this->db->query('UPDATE admin SET phone = :newContactNumber WHERE phone = :currentContactNumber');
        $this->db->bind(':newContactNumber', $newContactNumber);
        $this->db->bind(':currentContactNumber', $currentContactNumber);

        // Execute
        if ($this->db->execute()) {
            return true;// Return true if the contact number is successfully updated
        } else {
            return false;// Return false if there is an error
        }
    }

    public function updateEmail($currentEmail, $newEmail)
    {
         // Update the email address for the admin
        $this->db->query('UPDATE admin SET email = :new_email WHERE email = :current_email');
        $this->db->bind(':new_email', $newEmail);
        $this->db->bind(':current_email', $currentEmail);

        // Execute
        if ($this->db->execute()) {
            return true;// Return true if the email address is successfully updated
        } else {
            return false;// Return false if there is an error
        }
    }


    public function updatePassword($newPassword, $confirmPassword)
    {
        // Update the password for the admin
        $this->db->query('UPDATE admin SET password = :password');
        $this->db->bind(':password', $newPassword);

        // Execute the query
        if ($this->db->execute()) {
            return true;// Return true if the password is successfully updated
        } else {
            return false;// Return false if there is an error
        }
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function getPharmacyReceivedOrders()
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT pharmacyName, COUNT(*) AS orderId
                      FROM bidtable
                      WHERE status = 'received'
                      GROUP BY pharmacyName");

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSearchPharmacyReceivedOrders($searchTerm)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName LIKE '$searchTerm%' ORDER BY pharmacyName ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }

    public function getPharmacyReceivedOrderDetails($pharmacyName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName = :pharmacyName AND status = 'received'");
        $this->db->bind(':pharmacyName', $pharmacyName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getPharmacyReceivedOrderById($pharmacyName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName = :pharmacyName AND status = 'received'");
        $this->db->bind(':pharmacyName', $pharmacyName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getPharmacyRejectedOrders()
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT pharmacyName, COUNT(*) AS orderId
                          FROM bidtable
                          WHERE status = 'pharmacy rejected'
                          GROUP BY pharmacyName");

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSearchPharmacyRejectedOrders($searchTerm)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName LIKE '$searchTerm%' ORDER BY pharmacyName ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }

    public function getPharmacyRejectedOrderById($pharmacyName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName = :pharmacyName AND status = 'pharmacy rejected'");
        $this->db->bind(':pharmacyName', $pharmacyName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getPharmacyRejectedOrderDetails($pharmacyName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName = :pharmacyName AND status = 'pharmacy rejected'");
        $this->db->bind(':pharmacyName', $pharmacyName);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getPharmacyCancelledOrders()
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT pharmacyName, COUNT(*) AS orderId
        FROM bidtable
        WHERE status = 'pharmacy cancelled'
        GROUP BY pharmacyName");


        $results = $this->db->resultSet();
        return $results;
    }

    public function getSearchPharmacyCancelledOrders($searchTerm)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName LIKE '$searchTerm%' ORDER BY pharmacyName ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }


    public function getPharmacyCancelledOrderById($pharmacyName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName = :pharmacyName AND status = 'pharmacy cancelled'");
        $this->db->bind(':pharmacyName', $pharmacyName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getPharmacyCancelledOrderDetails($pharmacyName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyName = :pharmacyName AND status = 'pharmacy cancelled'");
        $this->db->bind(':pharmacyName', $pharmacyName);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getSupplierDeliveredOrders()
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT supplierName, COUNT(*) AS orderId
                      FROM bidtable
                      WHERE status = 'delivered'
                      GROUP BY supplierName");

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSearchSupplierDeliveredOrders($searchTerm)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName LIKE '$searchTerm%' ORDER BY supplierName ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }

    public function getSupplierDeliveredOrderById($supplierName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName = :supplierName AND status = 'delivered'");
        $this->db->bind(':supplierName', $supplierName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSupplierDeliveredOrderDetails($supplierName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName = :supplierName AND status = 'delivered'");
        $this->db->bind(':supplierName', $supplierName);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getSupplierRejectedOrders()
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT supplierName, COUNT(*) AS orderId
                          FROM bidtable
                          WHERE status = 'supplier rejected'
                          GROUP BY supplierName");

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSearchSupplierRejectedOrders($searchTerm)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName LIKE '$searchTerm%' ORDER BY supplierName ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }

    public function getSupplierRejectedOrderById($supplierName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName = :supplierName AND status = 'supplier rejected'");
        $this->db->bind(':supplierName', $supplierName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSupplierRejectedOrderDetails($supplierName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName = :supplierName AND status = 'supplier rejected'");
        $this->db->bind(':supplierName', $supplierName);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getSupplierCancelledOrders()
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT supplierName, COUNT(*) AS orderId
        FROM bidtable
        WHERE status = 'supplier cancelled'
        GROUP BY supplierName");


        $results = $this->db->resultSet();
        return $results;
    }

    public function getSearchSupplierCancelledOrders($searchTerm)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName LIKE '$searchTerm%' ORDER BY supplierName ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }

    public function getSupplierCancelledOrderById($supplierName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName = :supplierName AND status = 'supplier cancelled'");
        $this->db->bind(':supplierName', $supplierName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSupplierCancelledOrderDetails($supplierName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE supplierName = :supplierName AND status = 'supplier cancelled'");
        $this->db->bind(':supplierName', $supplierName);

        $results = $this->db->resultSet();
        return $results;
    }

}