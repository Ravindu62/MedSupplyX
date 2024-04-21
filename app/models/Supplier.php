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
        $this->db->query('SELECT * FROM requestorder ORDER BY createdAt DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    // update the status of the order
    public function approveOrder($data)
    {
        $this->db->query('UPDATE `requestorder` SET `status` = "Approved" WHERE `requestorder`.`id` = :id');
        $this->db->query('INSERT INTO `requestorder` (`price`) VALUES (:price)');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':price', $data['price']);
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
        $this->db->query('INSERT INTO bidtable (medicineId, pharmacyId, pharmacyName , bidAmount, type, volume , brand, category,  deliveryDate , orderedDate, supplierId , supplierName) 
                          VALUES (:medicineId, :pharmacyId, :pharmacyName, :bidAmount, :type, :volume, :brand, :category, :deliveryDate, :orderedDate, :supplierId, :supplierName)');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':pharmacyId', $data['pharmacyId']);
        $this->db->bind(':pharmacyName', $data['pharmacyName']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':orderedDate', date('Y-m-d'));
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
}
