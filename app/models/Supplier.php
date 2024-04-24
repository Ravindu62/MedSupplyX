<?php
class Supplier
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getOrder()
    {
        $this->db->query(
            'SELECT *
             FROM requestorder
             WHERE id NOT IN (
                 SELECT orderId
                 FROM bidtable
                 WHERE supplierId = :supplierId)'
        );

        
        
        
        $results = $this->db->resultSet();
        return $results;
    }
    // update the status of the order
    public function updateOrderStatus($data)
    {
        $this->db->query('UPDATE bidtable SET status = "accepted" WHERE supplierId = :supplierId');
        // Bind values
        $this->db->bind(':supplierId', $data['supplierId']);
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
    public function acceptBid($data)
    {
        $this->db->query('INSERT INTO bidtable (medicineId, medicineName, quantity,  pharmacyId, pharmacyName , bidAmount, type, volume , brand, category,  deliveryDate , orderedDate, approvedDate, supplierId , supplierName) 
                          VALUES (:medicineId, :medicineName, :quantity, :pharmacyId,   :pharmacyName, :bidAmount, :type, :volume, :brand, :category, :deliveryDate, :orderedDate, :approvedDate, :supplierId, :supplierName)');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':pharmacyId', $data['pharmacyId']);
        $this->db->bind(':pharmacyName', $data['pharmacyName']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':orderedDate',  $data['orderedDate']);
        $this->db->bind(':approvedDate', date('Y-m-d H:i:s'));
        $this->db->bind(':bidAmount', $data['bidAmount']);
        $this->db->bind(':deliveryDate', $data['deliveryDate']);

        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':supplierName', $_SESSION['USER_DATA']['name']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAcceptBid()
    {
        // select recodeds from bidtable where status is approved and supplierId is equal to the current user id
        $this->db->query('SELECT * FROM bidtable WHERE status = "accepted" AND supplierId = :supplierId ORDER BY approvedDate DESC');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }
}

