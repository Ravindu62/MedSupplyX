<?php
class pharmacy
{
    private $db;
    private $query;

    public function __construct()
    {
        $this->db = new Database;
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Dashboard Data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function countTotalOrders($pharmacyId)
    {
        // Assuming $pharmacyName holds the pharmacy name passed to the method
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM requestorder WHERE pharmacy_id = :pharmacyId", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }


    public function countAcceptedOrders($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'accepted'", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countPendingOrders($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'pending'", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countRejectedOrders($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM requestorder WHERE pharmacy_id = :pharmacyId AND status IN ('rejected', 'pharmacy rejected', 'supplier rejected')", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countOutOfStockProducts($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM inventory WHERE pharmacy_id = :pharmacyId AND status = 'out'", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countCancelledOrders($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'cancelled'", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function countTodaysCustomerOrders($pharmacyId, $billDate)
    {
        // Query the database to count the orders for the specified pharmacy ID and date
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM customerorder WHERE pharmacyId = :pharmacyId AND DATE(billDate) = :billDate", array('pharmacyId' => $pharmacyId, 'billDate' => $billDate));

        if ($this->query) {
            // Return the count of orders
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }


    public function countBills($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM customerorder WHERE pharmacyId = :pharmacyId", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function ongoingOrders($pharmacyId)
    {
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'pending'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function pendingOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = '$pharmacyId' AND status = 'pending'");

        $results = $this->db->resultSet();
        return $results;
    }

    public function rejectedOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = '$pharmacyId' AND status IN ('rejected', 'pharmacy rejected', 'supplier rejected')");

        $results = $this->db->resultSet();
        return $results;
    }

    public function todaysCustomerOrders($pharmacyId, $billDate)
    {
        $this->db->query("SELECT * FROM customerorder WHERE pharmacyId = :pharmacyId AND DATE(billDate) = :billDate");
        $this->db->bind(':pharmacyId', $pharmacyId);
        $this->db->bind(':billDate', $billDate);

        $results = $this->db->resultSet();

        return $results;
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Inventory data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getInventoryItems($pharmacyId)
    {
        $this->db->query('SELECT * FROM inventory WHERE pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addInventory($data)
    {
        $this->db->query('INSERT INTO inventory (pharmacy_id, medicine_id, name, batch_no, category_no, quantity, manu_date, expire_date, unit_amount) VALUES(:pharmacyId, :medicineId, :medicineName, :batchNo, :category, :quantity, :manufacturedDate, :expireDate, :unitPrice)');
        // Bind values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        $this->db->bind(':unitPrice', $data['unitPrice']);

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editInventory($data)
    {
        $this->db->query('UPDATE inventory SET medicine_id = :medicineId, name = :medicineName, batch_no = :batchNo, category_no = :category, quantity = :quantity, manu_date = :manufacturedDate, expire_date = :expireDate, unit_amount = :unitPrice WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        $this->db->bind(':unitPrice', $data['unitPrice']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getInventoryItemById($id)
    {
        $this->db->query('SELECT * FROM inventory WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function removeInventory($id)
    {
        $this->db->query('DELETE FROM inventory WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Notification data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getMessages($pharmacyId)
    {
        $this->db->query("SELECT * FROM messages WHERE pharmacyId = :pharmacyId");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addMessage($data)
    {
        $this->db->query('INSERT INTO messages (pharmacyId, sender, receiver, heading, message) VALUES(:pharmacyId, :sender, :receiver, :heading, :message)');
        // Bind values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
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



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Advertisetment data/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getAdvertisement()
    {
        $this->db->query("SELECT * FROM advertisement");
        $results = $this->db->resultSet();
        return $results;
        
    }





    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Supplier Order/////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = '$pharmacyId'");
        /* $this->db->bind(':pharmacy_id', $id); */

        $results = $this->db->resultSet();
        return $results;
    }

    public function addOrder($data)
    {
        $this->db->query('INSERT INTO requestorder (pharmacyname, medicine, batchno, quantity, deliveryDate, orderEndDate) VALUES(:pharmacyname , :medicineName, :batchNumber, :quantity, :deliveryDate, :orderEntryDate)');
        //Bind values
        $this->db->bind(':pharmacyname', $data['pharmacyname']);
        $this->db->bind(':medicineName', $data['Mname']);
        $this->db->bind(':batchNumber', $data['Bnum']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':deliveryDate', $data['ddate']);
        $this->db->bind(':orderEntryDate', $data['oedate']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function acceptedOrders()
    {

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = '$pharmacyId' AND status = 'accepted'");
        /* $this->db->bind(':pharmacy_id', $id); */

        $results = $this->db->resultSet();
        return $results;
    }

    public function selectedOrders()
    {

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = '$pharmacyId' AND status = 'selected'");
        /* $this->db->bind(':pharmacy_id', $id); */

        $results = $this->db->resultSet();
        return $results;
    }

    public function deleteOrder($id)
    {
        $this->db->query('DELETE FROM requestorder WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderById($id)
    {
        $this->db->query('SELECT * FROM requestorder WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Customer Order data/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////History data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getDeliveredOrders($pharmacyId)
    {
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'delivered'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCancelledOrdersByPharmacy($pharmacyId)
    {
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'cancelled'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRejectedOrdersBySuppliers($pharmacyId)
    {
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'supplier rejected'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getRejectedOrdersByPharmacy($pharmacyId)
    {
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'pharmacy rejected'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Profile data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getProfileData($pharmacyId)
    {
        // Execute the query
        $this->db->query("SELECT * FROM pharmacyregistration 
        INNER JOIN users ON pharmacyregistration.user_id = users.id 
        WHERE pharmacyregistration.user_id = :pharmacyId");

        // Bind the parameter
        $this->db->bind(':pharmacyId', $pharmacyId);

        // Retrieve a single row
        $row = $this->db->single();

        // Check if a row was returned
        if ($row) {
            return $row; // Return the data
        } else {
            // Log or echo an error message
            error_log("No profile data found for pharmacy: $pharmacyId");
            return false; // Or handle the error in any other way you prefer
        }
    }

    public function getUpdateProfileData($email)
    {
        // Execute the query
        $this->db->query("SELECT * FROM pharmacyregistration WHERE email = :email");

        // Bind the parameter
        $this->db->bind(':email', $email);

        // Retrieve a single row
        $row = $this->db->single();

        // Check if a row was returned
        if ($row) {
            return $row; // Return the data
        } else {
            // Log or echo an error message
            error_log("No profile data found for pharmacy: $email");
            return false; // Or handle the error in any other way you prefer
        }
    }

    public function changeContactNumber($data)
    {
        $this->db->query('UPDATE pharmacyregistration SET phone = :phone WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function changeEmail($data){
        $this->db->query('UPDATE pharmacyregistration SET email = :newEmail WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':newEmail', $data['newEmail']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword($data){
        $this->db->query('UPDATE phamacyregistration SET password = :newPassword WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':newPassword', $data['newPassword']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
