<?php
class Order
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function findMedicine($name)
    {
        $this->db->query('SELECT * FROM `regmedicines` WHERE `Medicine Name` = :name');
        // Bind value
        $this->db->bind(':name', $name);
        $row = $this->db->single();
        // Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}
