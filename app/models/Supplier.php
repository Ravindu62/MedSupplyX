<?php
class Supplier{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getOrder()
    {
        $this->db->query('SELECT * FROM `requestorder`');

        $results = $this->db->resultSet();

        return $results;
    }

    // update the status of the order
    public function approveOrder($data) {
        $this->db->query('UPDATE `requestorder` SET `status` = "Approved" WHERE `requestorder`.`id` = :id');
        $this->db->query('INSERT INTO `requestorder` (`price`) VALUES (:price)');

        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':price', $data['price']);


    }
}