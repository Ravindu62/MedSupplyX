<?php
class pharmacy
{
    private $db;
    private $query;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addOrder($data)
    {
        $this->db->query('INSERT INTO requestorder (pharmacyname,medicine, batchno, quantity, deliveryDate, orderEndDate) VALUES(:pharmacyname , :medicineName, :batchNumber, :quantity, :deliveryDate, :orderEntryDate)');
        // Bind values
        $this->db->bind(':pharmacyname', $_SESSION['USER_DATA']['name']);
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

    public function getOrder()
    {
        $pharmacyname = trim($_SESSION['USER_DATA']['name']);

        $this->db->query("SELECT * FROM requestorder WHERE pharmacyname = '$pharmacyname'");
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

    public function getProfileData($id)
    {
        $this->db->query("SELECT * FROM pharmacyregistration WHERE id = :id");
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        // Check if a row was returned
        if ($row) {
            return $row;
        } else {
            // Log or echo an error message
            error_log("No profile data found for ID: $id");
            return false;
        }
    }



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
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'rejected'", array('pharmacyId' => $pharmacyId));

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

    public function countExpiredOrders($pharmacyId)
    {
        $this->query = $this->db->query2("SELECT COUNT(*) as count FROM inventory WHERE pharmacy_id = :pharmacyId AND status = 'expired'", array('pharmacyId' => $pharmacyId));

        if ($this->query) {
            return $this->query[0]->count;
        } else {
            // Handle the error, e.g., log it or return an appropriate value
            return 0;
        }
    }

    public function getInventoryItems($pharmacyId)
    {
        $this->db->query("SELECT * FROM inventory WHERE pharmacy_id = :pharmacyId");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getDeliverdOrders($pharmacyId)
    {
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'delivered'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCanceledOrders($pharmacyId){
        $this->db->query("SELECT * FROM requestorder WHERE pharmacy_id = :pharmacyId AND status = 'canceled'");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();

        return $results;
    }
}
