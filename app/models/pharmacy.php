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
    public function countTotalOngoingOrders($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM bidtable WHERE (status = "accepted" OR status = "approved") AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countPendingOrders($pharmacyId)
    {
        $this->db->query("SELECT COUNT(*) as count FROM requestorder WHERE status = 'pending' AND pharmacy_id = :pharmacyId");
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countAcceptedOrders($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM bidtable WHERE status = "accepted" AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }
    public function countApprovedOrders($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM bidtable WHERE status = "approved" AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }


    public function countRejectedOrders($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM bidtable WHERE (status = "supplier rejected" OR status = "pharmacy rejected") AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countCancelledOrders($pharmacyId)
    {
        $this->db->query("SELECT COUNT(*) as count FROM requestorder WHERE status = 'cancelled' AND pharmacy_id = :pharmacyId");
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countReceivedOrders($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM bidtable WHERE status = "delivered" AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countTotalMedicines($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM inventory WHERE pharmacy_id = :pharmacyId GROUP BY name');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countTotalMedicineQuantity($pharmacyId)
    {
        $this->db->query('SELECT SUM(quantity) AS totalQuantity FROM inventory WHERE pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->totalQuantity;
    }

    public function countNearExpireDateMedicines($pharmacyId)
    {
        $this->db->query('SELECT COUNT(*) AS count FROM inventory WHERE expire_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->count;
    }

    public function countWorthOfInventory($pharmacyId)
    {
        $this->db->query('SELECT SUM(unit_amount * quantity) AS total_price FROM inventory WHERE pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->single();
        return $row->total_price;
    }


    public function ongoingOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM bidtable WHERE (status = "accepted" OR status = "approved") AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function pendingOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM requestorder WHERE status = "pending" AND pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function acceptedSupplierOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM bidtable WHERE status = "accepted" AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function approvedOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM bidtable WHERE status = "approved" AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function receivedOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM bidtable WHERE status = "delivered" AND pharmacyId = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function rejectedOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM bidtable WHERE (status = "supplier rejected" OR status = "pharmacy rejected") AND pharmacyId = :pharmacyId ORDER BY status ASC');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function cancelOrders($pharmacyId)
    {
        $this->db->query('SELECT * FROM requestorder WHERE status = "cancelled" AND pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function totalMedicines($pharmacyId)
    {
        $this->db->query('SELECT name, SUM(quantity) as totalQuantity, category FROM inventory WHERE pharmacy_id = :pharmacyId GROUP BY name');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $rows = $this->db->resultSet();
        return $rows;
    }

    public function nearExpireDateMedicines($pharmacyId)
    {
        $this->db->query('SELECT name, category, expire_date FROM inventory WHERE expire_date BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) AND pharmacy_id = :pharmacyId');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function worthOfInventory($pharmacyId)
    {
        $this->db->query('SELECT name, SUM(unit_amount * quantity) AS total_price, category, unit_amount, SUM(quantity) AS totalQuantity FROM inventory WHERE pharmacy_id = :pharmacyId GROUP BY name');
        $this->db->bind(':pharmacyId', $pharmacyId);
        $rows = $this->db->resultSet();
        return $rows;
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Inventory data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getInventory()
    {
        // select records from inventory where supplierId is equal to the current user id
        $this->db->query('SELECT name, SUM(quantity) AS totalQuantity, category, medicineId FROM inventory WHERE pharmacy_id = :pharmacyId GROUP BY medicineId ORDER BY name ASC');

        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getInventoryItemsByName($pharmacyId)
    {
        $this->db->query("SELECT name, SUM(quantity) AS totalQuantity, category
        FROM inventory
        WHERE pharmacy_id = :pharmacyId
        GROUP BY name");

        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getMedicineStock($id)
    {
        $this->db->query('SELECT * FROM inventory WHERE medicineId = :medicineId AND pharmacy_id = :pharmacyId');
        $this->db->bind(':medicineId', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function checkBatchNo($data)
    {
        $this->db->query('SELECT * FROM inventory WHERE batch_no = :batchNo AND pharmacy_id = :pharmacyId');
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getSearchMedicine($searchTerm)
    {


        $this->db->query("SELECT * FROM regmedicines WHERE medicinename LIKE '%$searchTerm%' ORDER BY medicinename ASC");
        $results = $this->db->resultSet();

        // Return the results
        return $results;
    }

    public function addMedicineStock($data)
    {
        $this->db->query('INSERT INTO inventory (medicineId, pharmacy_id, name, volume, type, category, brand, batch_no, refno, quantity, manu_date, expire_date, unit_amount, description)
                                                VALUES (:medicineId, :pharmacyId, :medicineName, :volume, :type, :category, :brand, :batchNo, :refno, :quantity, :manufacturedDate, :expireDate, :unitPrice, :description)');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':pharmacyId', $data['pharmacyId']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':refno', $data['refno']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        $this->db->bind(':unitPrice', $data['unitPrice']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSameMedicineInventory($id)
    {
        $this->db->query('SELECT * FROM inventory WHERE medicineId = :medicineId AND pharmacy_id = :pharmacyId ORDER BY brand ASC');
        $this->db->bind(':medicineId', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getMedicines()
    {
        $this->db->query('SELECT * FROM regmedicines');
        $results = $this->db->resultSet();
        return $results;
    }

    public function showInventoryBrandDetails($name)
    {
        $this->db->query("SELECT * FROM inventory WHERE name = :name AND pharmacy_id = :pharmacyId");
        $this->db->bind(':name', $name);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->resultSet();
        return $results;
    }

    public function showInventoryDetails($id)
    {
        $this->db->query("SELECT * FROM inventory WHERE id = :id AND pharmacy_id = :pharmacyId");
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->single();
        return $results;
    }


    public function getRegisteredMedicineBrands()
    {
        $this->db->query("SELECT * FROM medicinebrands");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getBrandsByMedicineId($id)
    {
        $this->db->query("SELECT * FROM medicinebrands WHERE medicineId = :id");
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function addInventory($data)
    {
        $this->db->query('INSERT INTO inventory (pharmacy_id, medicineId, refno, name, batch_no, category, volume, type, brand, quantity, manu_date, expire_date, unit_amount, description) VALUES(:pharmacyId, :medicineId, :refno, :medicineName, :batchNo, :category, :volume, :type, :brand, :quantity, :manufacturedDate, :expireDate, :unitPrice, :description)');
        // Bind values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':refno', $data['refno']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        $this->db->bind(':unitPrice', $data['unitPrice']);
        $this->db->bind(':description', $data['description']);

        // Execute

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editInventory($data)
    {
        $this->db->query('UPDATE inventory SET refno = :refno, name = :medicineName, batch_no = :batchNo, category = :category, volume = :volume, type = :type, brand = :brand, quantity = :quantity, manu_date = :manufacturedDate, expire_date = :expireDate, unit_amount = :unitPrice, description = :description WHERE id = :id AND pharmacy_id = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':refno', $data['refno']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        $this->db->bind(':unitPrice', $data['unitPrice']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getInventoryItemById($id)
    {
        $this->db->query('SELECT * FROM inventory WHERE id = :id AND pharmacy_id = :pharmacyId');

        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $row = $this->db->single();

        return $row;
    }

    public function getInventoryItemByMedicineId($id)
    {
        $this->db->query('SELECT * FROM inventory WHERE medicineId = :id AND pharmacy_id = :pharmacyId');

        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $row = $this->db->single();

        return $row;
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

    public function reduceInventory($data)
    {
        $this->db->query('UPDATE inventory SET quantity = quantity - :quantity WHERE id = :id AND pharmacy_id = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $this->db->bind(':quantity', $data['quantity']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function changeInventory($data)
    {
        $this->db->query('UPDATE inventory SET quantity = quantity + :quantity WHERE id = :id AND pharmacy_id = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $this->db->bind(':quantity', $data['quantity']);

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

    public function getInboxMessage() {
        $this->db->query("SELECT * FROM messages WHERE receiver = 'pharmacy'");
        
        $results = $this->db->resultSet();
        return $results;
    }

    public function getSupplierList()
    {
        $this->db->query("SELECT * FROM supplierregistration WHERE status = 'approved'");
        $results = $this->db->resultSet();
        return $results;
    }

    // public function getSupplierById($id)
    // {
    //     $this->db->query('SELECT supdet.*, userdet.* FROM suppliers supdet
    //                       INNER JOIN users userdet ON supdet.userId = userdet.id
    //                       WHERE supdet.id = :id');
    //     $this->db->bind(':id', $id);
    //     $row = $this->db->single();
    //     return $row;
    // }

    public function getSupplierById($id)
    {
        $this->db->query('SELECT id FROM users WHERE userId = :id');
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
        $this->db->query('INSERT INTO messages (pharmacyId, sender, receiver, heading, message) VALUES(:pharmacyId, :sender, :receiver, :heading, :message)');
        // Bind values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':sender', $_SESSION['USER_DATA']['email']);
        $this->db->bind(':receiver', $data['receiver']);
        $this->db->bind(':heading', $data['topic']);
        $this->db->bind(':message', $data['description']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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

    public function getAcceptedOrderById($id)
    {
        $this->db->query("SELECT * FROM bidtable WHERE id = :id AND pharmacyId = :pharmacyId AND status = 'accepted'");
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function addReplyToRemarks($data)
    {
        $this->db->query("UPDATE bidtable SET reply = :reply, status = 'approved' WHERE id = :id AND pharmacyId = :pharmacyId");
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':reply', $data['reply']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderItemsByName($medicineName)
    {
        $this->db->query("SELECT * FROM bidtable WHERE medicineName = :medicineName AND pharmacyId = :pharmacyId AND status = 'accepted' ORDER BY bidAmount ASC");
        $this->db->bind(':medicineName', $medicineName);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function rejectBid($data)
    {
        $this->db->query('UPDATE bidtable SET status = "pharmacy rejected", reason = :reason WHERE id = :id AND pharmacyId = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':reason', $data['reason']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
        $this->db->query('INSERT INTO requestorder (pharmacy_id, pharmacyname, medicine_id, medicine_name, refno, type, brand, volume, category, quantity, deliveryDate) 
                                           VALUES(:pharmacy_id, :pharmacyname, :medicine_id, :medicine_name, :refno, :type, :brand, :volume, :category, :quantity, :deliveryDate)');



        // Bind valuee
        $this->db->bind(':pharmacy_id', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':pharmacyname', $_SESSION['USER_DATA']['name']);
        $this->db->bind(':medicine_id', $data['medicineId']);
        $this->db->bind(':medicine_name', $data['medicineName']);
        $this->db->bind(':refno', $data['refno']);
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
        $this->db->query("SELECT medicineName, quantity, category
        FROM bidtable
        WHERE pharmacyId = :pharmacyId AND status = 'accepted'
        GROUP BY medicineName");

        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }

    public function changeStatus($data)
    {
        $this->db->query('UPDATE bidtable SET status = "approved", approvedDate = :approvedDate WHERE id = :id AND pharmacyId = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $data['bidId']);
        $this->db->bind(':pharmacyId', trim($_SESSION['USER_DATA']['id']));
        $this->db->bind(':approvedDate', $data['approvedDate']);

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

        $this->db->query("SELECT * FROM bidtable WHERE pharmacyId = '$pharmacyId' AND status = 'delivered'");
        /* $this->db->bind(':pharmacy_id', $id); */

        $results = $this->db->resultSet();
        return $results;
    }
    public function cancelOrder($id)
    {
        $this->db->query('UPDATE requestorder SET status = "cancelled" WHERE id = :id AND pharmacy_id = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDeliveredOrderDetails($id)
    {
        $this->db->query('SELECT * FROM deliveredorders WHERE bidTableId = :id AND pharmacyId = :pharmacyId');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->resultSet();
        return $results;
     
    }

    public function addReceivedOrderInventory($data)
    {
        // Prepare the SQL query for inserting data into the inventory table
        $this->db->query('INSERT INTO inventory (bidTableId, pharmacy_id, supplier_id, medicineId, name, volume, type, category, brand, quantity, manu_date, expire_date)
                SELECT bidTableId, :pharmacyId, supplierId, medicineId, medicineName, volume, type, category, brand, quantity, manufacturedDate, expireDate
                FROM deliveredorders WHERE bidTableId = :id AND pharmacyId = :pharmacyId');
       
        // Bind values for the current row
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        
      
        // Execute the query
        if ($this->db->execute()) {
            // Prepare the SQL query for updating batchno, unitprice, and description
            $this->db->query('UPDATE inventory SET batch_no = :batchNo, unit_amount = :unitPrice, description = :description 
            WHERE pharmacy_id = :pharmacyId AND bidTableId = :id');
            
            // Bind values for the update
            $this->db->bind(':batchNo', $data['batchNo']);
            $this->db->bind(':unitPrice', $data['unitPrice']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
            $this->db->bind(':id', $data['id']);

    
           //execute the query
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
       


    public function getReceivedOrderDetails($id)
    {
        $this->db->query('SELECT * FROM bidtable WHERE id = :id AND pharmacyId = :pharmacyId AND status = "delivered"');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    // Model Method getInventoryByMedicineId()
    public function getInventoryByMedicineId($medicineId)
    {
        $this->db->query('SELECT * FROM inventory WHERE medicineId = :medicineId AND pharmacy_id = :pharmacyId');
        // Bind values
        $this->db->bind(':medicineId', $medicineId);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }


    // Model Method addReceivedOrderInventory()
   

    // Model Method changeStatusAsAddedtoInventory()
    public function changeStatusAsAddedtoInventory($data)
    {
        // Use UPDATE instead of INSERT INTO
        $this->db->query('UPDATE bidtable SET status = "added" WHERE pharmacyId = :pharmacyId AND id = :id');
        // Bind Values
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':id', $data['id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    public function getOrderById($id)
    {
        $this->db->query('SELECT * FROM requestorder WHERE id = :id AND pharmacy_id = :pharmacyId');
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
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
        $this->db->bind(':brand', $data['brands']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////History data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getDeliveredOrders($pharmacyId)
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT medicineName, SUM(quantity) AS totalQuantity, category
                          FROM bidtable
                          WHERE pharmacyId = :pharmacyId AND status = 'received'
                          GROUP BY medicineName");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }



    public function getDeliveredOrderMedicineBrandDetails($medicineName)
    {
        $this->db->query("SELECT * 
                          FROM bidtable
                          WHERE medicineName = :medicineName AND status = 'delivered'");

        $this->db->bind(':medicineName', $medicineName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getDeliveredOrderById($id)
    {
        $this->db->query('SELECT * FROM bidtable WHERE id = :id AND pharmacyId = :pharmacyId AND status = "delivered"');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function getSupplierRejectedOrders($pharmacyId)
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT medicineName, SUM(quantity) AS totalQuantity, category
                          FROM bidtable
                          WHERE pharmacyId = :pharmacyId AND status = 'supplier rejected'
                          GROUP BY medicineName");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }



    public function getSupplierRejectedOrderMedicineBrandDetails($medicineName)
    {
        $this->db->query("SELECT * 
                          FROM bidtable
                          WHERE medicineName = :medicineName AND status = 'supplier rejected'");

        $this->db->bind(':medicineName', $medicineName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getSupplierRejectedOrderById($id)
    {
        $this->db->query('SELECT * FROM bidtable WHERE id = :id AND pharmacyId = :pharmacyId AND status = "supplier rejected"');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function getPharmacyRejectedOrders($pharmacyId)
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT medicineName, SUM(quantity) AS totalQuantity, category
                          FROM bidtable
                          WHERE pharmacyId = :pharmacyId AND status = 'pharmacy rejected'
                          GROUP BY medicineName");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }



    public function getPharmacyRejectedOrderMedicineBrandDetails($medicineName)
    {
        $this->db->query("SELECT * 
                          FROM bidtable
                          WHERE medicineName = :medicineName AND status = 'pharmacy rejected'");

        $this->db->bind(':medicineName', $medicineName);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getPharmacyRejectedOrderById($id)
    {
        $this->db->query('SELECT * FROM bidtable WHERE id = :id AND pharmacyId = :pharmacyId AND status = "pharmacy rejected"');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function getCancelledOrders($pharmacyId)
    {
        // Get delivered orders from the bidtable where the status is delivered and the pharmacyId is the current pharmacyId
        // Group the results by the medicine name and select the total quantity and bid amount for each medicine
        $this->db->query("SELECT medicine_name, SUM(quantity) AS totalQuantity, category
                          FROM requestorder
                          WHERE pharmacy_id = :pharmacyId AND status = 'cancelled'
                          GROUP BY medicine_name");
        $this->db->bind(':pharmacyId', $pharmacyId);

        $results = $this->db->resultSet();
        return $results;
    }



    public function getCancelledOrderMedicineBrandDetails($medicineName)
    {
        $this->db->query("SELECT * 
                          FROM requestorder
                          WHERE medicine_name = :medicineName AND pharmacy_id = :pharmacyId AND status = 'cancelled'");

        $this->db->bind(':medicineName', $medicineName);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->resultSet();
        return $results;
    }

    public function getCancelledOrderById($id)
    {
        $this->db->query('SELECT * FROM requestorder WHERE id = :id AND pharmacy_id = :pharmacyId AND status = "cancelled"');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':pharmacyId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Profile data//////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getProfile($id)
    {
        // Retrieve the profile data for the admin
        $this->db->query("SELECT * FROM pharmacyregistration WHERE id = (SELECT userId FROM users WHERE id = :id)");
        $this->db->bind(':id', $id);
        $results = $this->db->single(); // Assuming there is only one admin profile
        return $results; // Return the data
    }




    public function updateContactNumber($data)
    {
        $this->db->query('UPDATE pharmacyregistration SET phone = :newContactNumber WHERE phone = :currentContactNumber AND id = (SELECT userId FROM users WHERE id = :id)');
        $this->db->bind(':newContactNumber', $data['newContactNumber']);
        $this->db->bind(':currentContactNumber', $data['currentContactNumber']);
        $this->db->bind(':id', $_SESSION['USER_DATA']['id']);

        // Execute
        if ($this->db->execute()) {
            return true; // Return true if the contact number is successfully updated
        } else {
            return false; // Return false if there is an error
        }
    }

    public function updateEmail($data)
    {
        // Update the email address for the pharmacy
        $this->db->query('UPDATE users SET email = :new_email WHERE email = :current_email AND id = :id');
        $this->db->bind(':new_email', $data['new_email']);
        $this->db->bind(':current_email', $data['current_email']);
        $this->db->bind(':id', $_SESSION['USER_DATA']['id']);

        // Execute the query
        if ($this->db->execute()) {
            // If the email address is successfully updated in the users table,
            // Update the email address in the pharmacy registration table as well
            $this->db->query('UPDATE pharmacyregistration SET email = :new_email WHERE email = :current_email AND id = (SELECT userId FROM users WHERE id = :id)');
            $this->db->bind(':new_email', $data['new_email']);
            $this->db->bind(':current_email', $data['current_email']);
            $this->db->bind(':id', $_SESSION['USER_DATA']['id']);

            // Execute the second query
            if ($this->db->execute()) {
                return true; // Return true if both updates are successful
            } else {
                return false; // Return false if there is an error updating the pharmacy registration table
            }
        } else {
            return false; // Return false if there is an error updating the users table
        }
    }

    public function getTotalReceivedquantity($id) {
        $this->db->query('SELECT SUM(quantity) AS totalQuantity FROM deliveredorders WHERE bidTableId = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    



    public function updatePassword($data)
    {
        // Update the password for the user in the users table
        $this->db->query('UPDATE users SET password = :password WHERE password = :current_password AND id = :id');
        $this->db->bind(':password', $data['newPassword']);
        $this->db->bind(':current_password', $data['currentPassword']);
        $this->db->bind(':id', $_SESSION['USER_DATA']['id']);

        // Execute the query
        if ($this->db->execute()) {
            // If the password is successfully updated in the users table,
            // Update the password in the pharmacy registration table as well
            $this->db->query('UPDATE pharmacyregistration SET password = :password WHERE password = :current_password AND id = (SELECT userId FROM users WHERE id = :id)');
            $this->db->bind(':password', $data['newPassword']);
            $this->db->bind(':current_password', $data['currentPassword']);
            $this->db->bind(':id', $_SESSION['USER_DATA']['id']);

            // Execute the second query
            if ($this->db->execute()) {
                return true; // Return true if both updates are successful
            } else {
                return false; // Return false if there is an error updating the pharmacy registration table
            }
        } else {
            return false; // Return false if there is an error updating the users table
        }
    }

    public function searchMedicine($searchTerm) {
        $this->db->query("SELECT * FROM regmedicines WHERE medicineName LIKE :searchTerm");
        $this->db->bind(':searchTerm', "%$searchTerm%");
        $results = $this->db->resultSet();
        return $results;
    }

    public function changeOrderStatus($id) {
        $this->db->query("UPDATE bidtable SET status = 'received' WHERE id = :id");

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }
    
}
   

