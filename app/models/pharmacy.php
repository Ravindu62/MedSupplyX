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
        $this->db->query('INSERT INTO inventory (pharmacy_id, medicine_id, name, batch_no, category, quantity, manu_date, expire_date, unit_amount) VALUES(:pharmacyId, :medicineId, :medicineName, :batchNo, :category, :quantity, :manufacturedDate, :expireDate, :unitPrice)');
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
        //get the mess
        $this->db->query("SELECT * FROM messages WHERE pharmacyId = :pharmacyId");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function addMessage($data)
    {
        $this->db->query('INSERT INTO messages (pharmacyId, sender, receiver, heading, message) VALUES(:pharmacyId, :message, :receiver, :heading, :message)');
        // Bind values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':sender', $_SESSION['USER_DATA']['name']);
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

        //show only orders after current date
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = '$pharmacyId' AND deliveryDate >= CURDATE() AND status = 'pending'");
        /* $this->db->bind(':pharmacy_id', $id); */

        $results = $this->db->resultSet();
        return $results;
    }

    public function getRegisteredMedicines()
    {
        $this->db->query("SELECT * FROM regmedicines");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getMedicineById($id)
    {
        $this->db->query("SELECT * FROM regmedicines WHERE medicineId = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getBrandById($id)
    {
        $this->db->query("SELECT * FROM medicinebrands WHERE medicineId = :id");
        // Bind values
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function submitOrder($data)
    {

        //submit order details to requestorder table and bidtable
        $this->db->query('INSERT INTO requestorder (pharmacy_id, pharmacyname, medicine_id, medicine_name, batchno, type, brand, volume, category, quantity, deliveryDate) VALUES(:pharmacy_id, :pharmacy
        name, :medicine_id, :medicine_name, :batchno, :type, :brand, :volume, :category, :quantity, :deliveryDate)');



        // Bind valuee
        $this->db->bind(':pharmacy_id', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':pharmacyname', $_SESSION['USER_DATA']['name']);
        $this->db->bind(':medicine_id', $data['medicineId']);
        $this->db->bind(':medicine_name', $data['medicineName']);
        $this->db->bind(':batchno', $data['refno']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':brand', $data['brands']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':deliveryDate', $data['deliveryDate']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }





    public function getOrderId($data)
    {
        $this->db->query('SELECT id FROM requestorder WHERE pharmacy_id = :pharmacy_id AND medicine_id = :medicine_id AND batchno = :batchno AND quantity = :quantity AND deliveryDate = :deliveryDate');

        // Bind values
        $this->db->bind(':pharmacy_id', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':medicine_id', $data['medicineId']);
        $this->db->bind(':batchno', $data['refno']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':deliveryDate', $data['deliveryDate']);

        $row = $this->db->single();
        return $row;
    }

    public function updateBidTable($data)
    {
        // get orderid from requestorder table
        $this->db->query('INSERT INTO bidtable (orderId, pharmacyId, pharmacyName, medicineId, medicineName, type, volume, category, quantity, brand, deliveryDate) VALUES(:orderId, :pharmacyId, :pharmacyName, :medicineId, :medicineName, :type, :volume, :category, :quantity, :brand, :deliveryDate)');

        //load order id


        // Bind values
        // $this->db->bind(':orderId', $orderId);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':pharmacyName', $_SESSION['USER_DATA']['name']);
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':deliveryDate', $data['deliveryDate']);

        // Execute
        if ($this->db->execute()) {
            // print order Id

            return true;
        } else {
            return false;
        }
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
        //get all accepted orders from bidtable
        $this->db->query("SELECT * FROM bidtable WHERE pharmacyId = :pharmacyId AND status = 'accepted'");

        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }

    public function changeStatus($data)
    {
        $this->db->query('UPDATE bidtable SET status = "approved" WHERE id = :id AND pharmacyId = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $data['bidId']);
        $this->db->bind(':pharmacyId', $data['pharmacyId']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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

    public function changeOrderDetails($data)
    {
        $this->db->query('UPDATE requestorder SET quantity = :quantity, deliveryDate = :deliveryDate, brand= :brand WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':deliveryDate', $data['deliveryDate']);
        $this->db->bind(':brand', $data['brand']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Customer Order data/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function customerDetails($data)
    {
        $this->db->query('INSERT INTO customerdetails (pharmacyId, pharmacyName, name, phone, address, email ) 
        VALUES(:pharmacyId, :pharmacyName, :name, :phone, :address, :email)');
        // Bind values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':pharmacyName', $_SESSION['USER_DATA']['name']);
        $this->db->bind(':name', $data['customerName']);
        $this->db->bind(':phone', $data['customerPhone']);
        $this->db->bind(':address', $data['customerAddress']);
        $this->db->bind(':email', $data['customerEmail']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchCustomerDetailsByName($customerName)
{
    // Query the database to fetch customer details by name
    // Assuming your database table is named 'customerdetails'
    $this->db->query('SELECT * FROM customerdetails WHERE name = :name');
    $this->db->bind(':name', $customerName);
    $customerDetails = $this->db->single();

    return $customerDetails;
}

public function getCustomerById($id){
    $this->db->query('SELECT * FROM customerdetails WHERE id = :id');
    $this->db->bind(':id', $id);
    $row = $this->db->single();

    return $row;
}


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

    public function getUpdateProfileData($pharmacyEmail)
    {
        // Execute the query
        $this->db->query("SELECT * FROM pharmacyregistration 
        INNER JOIN users ON pharmacyregistration.user_id = users.id 
        WHERE pharmacyregistration.email = :pharmacyEmail");

        // Bind the parameter
        $this->db->bind(':pharmacyEmail', $pharmacyEmail);

        // Retrieve a single row
        $row = $this->db->single();

        // Check if a row was returned
        if ($row) {
            return $row; // Return the data
        } else {
            // Log or echo an error message
            error_log("No profile data found for pharmacy: $pharmacyEmail");
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

    public function changeEmail($data)
    {
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

    public function changePassword($data)
    {
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

