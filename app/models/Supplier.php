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
        //display 
        $this->db->query(
            'SELECT *
             FROM requestorder
             WHERE id NOT IN (
                 SELECT orderId
                 FROM bidtable
                 WHERE supplierId = :supplierId)
                 AND status ="pending"'
        );

        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);



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


    public function acceptBid($data) {
    $this->db->query('INSERT INTO bidtable (medicineId, orderId,  medicineName, quantity,  pharmacyId, pharmacyName , bidAmount, type, volume , brand, category,  deliveryDate , orderedDate, supplierId , supplierName, remarks) 
                                   VALUES (:medicineId, :orderId, :medicineName, :quantity, :pharmacyId, :pharmacyName, :bidAmount, :type, :volume, :brand, :category, :deliveryDate, :orderedDate, :supplierId, :supplierName, :remarks)');
    // Bind values
    $this->db->bind(':medicineId', $data['medicineId']);
    $this->db->bind(':orderId', $data['orderId']);
    $this->db->bind(':medicineName', $data['medicineName']);
    $this->db->bind(':quantity', $data['quantity']);
    $this->db->bind(':pharmacyId', $data['pharmacyId']);
    $this->db->bind(':pharmacyName', $data['pharmacyName']);
    $this->db->bind(':bidAmount', $data['bidAmount']);
    $this->db->bind(':type', $data['type']);
    $this->db->bind(':volume', $data['volume']);
    $this->db->bind(':brand', $data['brand']);
    $this->db->bind(':category', $data['category']);
    $this->db->bind(':deliveryDate', $data['deliveryDate']);
    $this->db->bind(':orderedDate',  $data['orderedDate']);
    $this->db->bind(':remarks', $data['remarks']);

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


        
    public function getAcceptedOrderById($id)
    {
        $this->db->query('SELECT * FROM bidtable WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getApprovedOrderById($id)
    {
        $this->db->query('SELECT * FROM bidtable WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getApprovedBid()
    {
        // select recodeds from bidtable where status is approved and supplierId is equal to the current user id
        $this->db->query('SELECT * FROM bidtable WHERE status = "approved" AND supplierId = :supplierId ORDER BY approvedDate DESC');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }



    public function deliverOrder($data) {
        // Extracting data from $data array
        $requiredQuantity = $data['quantity'];
        $orderId = $data['orderId']; // Assuming orderId is part of the $data array
    
        // Prepare SQL query to select inventory items
        $sql = "SELECT * FROM supplierinventory WHERE supplierId = :supplierId AND medicineId = :medicineId AND brand = :brand AND quantity >0 ORDER BY expireDate ASC";
    
        // Bind values and execute the query
        $this->db->query($sql);
        $this->db->bind(':supplierId', $data['supplierId']);
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':brand', $data['brand']);
        $inventoryItems = $this->db->resultSet();
    
        // Array to store delivered orders data
        $deliveredOrders = [];
    
        // Deduct quantity from inventory items in FIFO manner
        foreach ($inventoryItems as $inventoryItem) {
            if ($requiredQuantity <= 0) {
                // If required quantity is already fulfilled, exit the loop
                break;
            }
            $quantityToDeduct = min($requiredQuantity, $inventoryItem->quantity);
    
            // Deduct the quantity from this inventory item
            $this->updateInventory($inventoryItem->id, $quantityToDeduct);
    
            // Store the delivered order details
            $deliveredOrders[] = [
                'orderId' => $data['orderId'],
                'bidTableId' => $data['id'], // Assuming bidTableId is available in supplierinventory
                'medicineId' => $inventoryItem->medicineId,
                'medicineName' => $inventoryItem->medicineName, // Assuming medicineName is available in supplierinventory
                'brand' => $inventoryItem->brand,
                'volume' => $inventoryItem->volume, // Assuming volume is available in supplierinventory
                'type' => $inventoryItem->type, // Assuming type is available in supplierinventory
                'category' => $inventoryItem->category, // Assuming category is available in supplierinventory
                // Add other relevant fields from supplierinventory or data array
                'quantity' => $quantityToDeduct,
                'manufacturedDate' => $inventoryItem->manufactureDate,
                'expireDate' => $inventoryItem->expireDate,
                'pharmacyId' => $data['pharmacyId'], // Assuming pharmacyId is part of the $data array
                'pharmacyName' => $data['pharmacyName'], // Assuming pharmacyName is part of the $data array
                'supplierId' => $data['supplierId'],
                'supplierName' => $data['supplierName'], // Assuming supplierName is part of the $data array
                
            ];
    
            // Reduce the remaining required quantity
            $requiredQuantity -= $quantityToDeduct;
        }
    
        // Insert records into deliveredOrders table
        foreach ($deliveredOrders as $order) {
            $this->insertDeliveredOrder($order);
        }
    
        if($requiredQuantity > 0) {
            // If required quantity is still remaining, throw an error
            return false;
        } else {
            return true;
        }
    }

    public function searchOrder($searchTerm) {

        // Prepare SQL query to search orders
        $this->db->query(
            "SELECT *
             FROM requestorder
             WHERE id NOT IN (
                 SELECT orderId
                 FROM bidtable
                 WHERE supplierId = :supplierId) 
                 AND medicine_name LIKE '$searchTerm%' ORDER BY medicine_name ASC"
        );

        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->resultSet();

        return $results;

    }
    
    public function getDeliveredOrders($data) {
        // Select delivered orders from deliveredOrders table
        $this->db->query('SELECT *, SUM(quantity) AS total FROM deliveredOrders WHERE supplierId = :supplierId GROUP BY medicineId , brand , createdAt ORDER BY createdAt DESC');
        $this->db->bind(':supplierId', $data['id']);
        $results = $this->db->resultSet();
        return $results;
    } 

    public function getRejectedOrders($data) {
        // Select rejected orders from bidtable table
        $this->db->query('SELECT * FROM bidtable WHERE supplierId = :supplierId AND status = "supplier rejected" ORDER BY approvedDate DESC');
        $this->db->bind(':supplierId', $data['id']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCancelledOrders() {
        // Select cancelled orders from bidtable table
        $this->db->query('SELECT * FROM requestorder WHERE status = "cancelled"');
        
        $results = $this->db->resultSet();
        return $results;
    }

    // Function to insert delivered order into deliveredOrders table
    private function insertDeliveredOrder($order) {
        // Prepare SQL query to insert into deliveredOrders table
        $sql = "INSERT INTO deliveredOrders (orderId, bidTableId, medicineId, medicineName, brand, volume, type, category, quantity, manufacturedDate, expireDate, pharmacyId, pharmacyName, supplierId, supplierName) 
                VALUES (:orderId, :bidTableId, :medicineId, :medicineName, :brand, :volume, :type, :category, :quantity, :manufacturedDate, :expireDate, :pharmacyId, :pharmacyName, :supplierId, :supplierName)";
    
        // Bind values and execute the query
        $this->db->query($sql);
        $this->db->bind(':orderId', $order['orderId']);
        $this->db->bind(':bidTableId', $order['bidTableId']);
        $this->db->bind(':medicineId', $order['medicineId']);
        $this->db->bind(':medicineName', $order['medicineName']);
        $this->db->bind(':brand', $order['brand']);
        $this->db->bind(':volume', $order['volume']); // Assuming volume is part of the $order array
        $this->db->bind(':type', $order['type']); // Assuming type is part of the $order array
        $this->db->bind(':category', $order['category']); // Assuming category is part of the $order array
        $this->db->bind(':quantity', $order['quantity']);
        $this->db->bind(':manufacturedDate', $order['manufacturedDate']);
        $this->db->bind(':expireDate', $order['expireDate']);
        $this->db->bind(':pharmacyId', $order['pharmacyId']);
        $this->db->bind(':pharmacyName', $order['pharmacyName']);
        $this->db->bind(':supplierId', $order['supplierId']);
        $this->db->bind(':supplierName', $order['supplierName']);
  
        $this->db->execute();
    }
    

    
    // Function to update inventory quantity
    private function updateInventory($inventoryItemId, $quantity) {
        // Prepare SQL query to update inventory quantity
        $sql = "UPDATE supplierinventory SET quantity = quantity - :quantity WHERE id = :inventoryItemId";
        // Bind values and execute the query
        $this->db->query($sql);
        $this->db->bind(':quantity', $quantity);
        $this->db->bind(':inventoryItemId', $inventoryItemId);
        $this->db->execute();
    }






    public function changestatustoDelivered($data) {
        $this->db->query('UPDATE bidtable SET status = "delivered" WHERE id = :id AND supplierId = :supplierId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    

    public function getInventoryItemMatchWithDeliverOrder($id) {
       // display all medicines match with the deliver order
        $this->db->query('SELECT * FROM supplierinventory WHERE medicineId = (SELECT medicineId FROM bidtable WHERE id = :id) 
        AND supplierId = :supplierId 
        AND quantity > 0 ORDER BY expireDate ASC');

        // Bind values
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;

    }

    public function isAvailableMedicine($data) {
        // check if the medicine is available in the inventory
        $this->db->query('SELECT * FROM supplierinventory WHERE medicineId = :medicineId AND brand = :brand AND supplierId = :supplierId AND quantity > 0');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);

        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
       

    public function getTotalQuantity($id) {
        // get total quantity of the medicine
        $this->db->query('SELECT SUM(quantity) AS total_quantity FROM supplierinventory WHERE medicineId = (SELECT DISTINCT medicineId FROM bidtable WHERE id = :id) AND brand = (SELECT DISTINCT brand FROM bidtable WHERE id = :id) AND supplierId = :supplierId');
        // Bind value
        $this->db->bind(':id', $id);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function cancelBid($data)
    {
        $this->db->query('UPDATE bidtable SET status = "supplier cancelled" WHERE id = :id AND supplierId = :supplierId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function rejectBid($data)
    {
        //change status into supplier rejected where the id is equal to the id of the order and supplierId is equal to the current user id and set the reason for rejection
        $this->db->query('UPDATE bidtable SET status = "supplier rejected", reason = :reason WHERE id = :id AND supplierId = :supplierId');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $this->db->bind(':reason', $data['reason']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function getInventory()
    {
        // select records from inventory where supplierId is equal to the current user id
        $this->db->query('SELECT * FROM supplierinventory WHERE supplierId = :supplierId GROUP BY medicineId ORDER BY medicineName ASC');

        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);

        $results = $this->db->resultSet();
        return $results;
    }


    public function getMedicineStock($id)
    {
        $this->db->query('SELECT * FROM supplierinventory WHERE medicineId = :medicineId AND supplierId = :supplierId');
        $this->db->bind(':medicineId', $id);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        return $row;
    }

    public function getSameMedicineStock($data)
    {
        //get total quantity  of the same medicine in the inventory
        $this->db->query('SELECT SUM(quantity) AS total_quantity FROM supplierinventory WHERE medicineId = :medicineId AND supplierId = :supplierId');
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
       
        // print total quantity of the same medicine in the inventory
        $row = $this->db->single();
        return $row;

       
    }


    
    public function checkBatchNo($data)
    {
        $this->db->query('SELECT * FROM supplierinventory WHERE batchNo = :batchNo AND supplierId = :supplierId');
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getBrandById($id)
    {
        $this->db->query('SELECT * FROM medicinebrands WHERE medicineId = :medicineId');
        $this->db->bind(':medicineId', $id);
      
        $results = $this->db->resultSet();
        return $results;
    }

    public function addMedicineStock($data)
    {
        $this->db->query('INSERT INTO supplierinventory (medicineId, supplierId, medicineName, volume, type, category, brand, batchNo, quantity, manufactureDate, expireDate) 
                                                VALUES (:medicineId, :supplierId, :medicineName, :volume, :type, :category, :brand, :batchNo, :quantity, :manufacturedDate, :expireDate)');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':supplierId', $data['supplierId']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //get same medicine inventories by medicine id
    public function getSameMedicineInventory($id) {
        $this->db->query('SELECT * FROM supplierinventory WHERE medicineId = :medicineId AND supplierId = :supplierId AND quantity > 0 ORDER BY brand ASC');
        $this->db->bind(':medicineId', $id);
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getMedicines()
    {
        $this->db->query('SELECT * FROM regmedicines');
        $results = $this->db->resultSet();
        return $results;
    }
   
    public function getMedicineById($id)
    {
        $this->db->query('SELECT * FROM regmedicines WHERE medicineId = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function addinventory($data)
    {
        $this->db->query('INSERT INTO supplierinventory (medicineId, supplierId, medicineName, volume, type, category, brand, batchNo, quantity, manufactureDate, expireDate) 
                                                VALUES (:medicineId, :supplierId, :medicineName, :volume, :type, :category, :brand, :batchNo, :quantity, :manufacturedDate, :expireDate)');
        // Bind values
        $this->db->bind(':medicineId', $data['medicineId']);
        $this->db->bind(':supplierId', $data['supplierId']);
        $this->db->bind(':medicineName', $data['medicineName']);
        $this->db->bind(':volume', $data['volume']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':category', $data['category']);
        $this->db->bind(':brand', $data['brand']);
        $this->db->bind(':batchNo', $data['batchNo']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':manufacturedDate', $data['manufacturedDate']);
        $this->db->bind(':expireDate', $data['expireDate']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //display count of orders
    public function countOrders()
    {
        $this->db->query('SELECT * FROM bidtable WHERE supplierId = :supplierId');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    // total orders in orderrequest
    public function countTotalOrders()
    {
        $this->db->query('SELECT * FROM requestorder');
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function countEachMedicine()
    {
        $this->db->query('SELECT medicineName, COUNT(*) AS medicine_count FROM supplierinventory WHERE supplierId = :supplierId GROUP BY medicineName');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function countGoingToExpireMedicine()
    {
        $this->db->query('SELECT * FROM supplierinventory WHERE supplierId = :supplierId AND expireDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function countMedicines()
    {
        $this->db->query('SELECT * FROM supplierinventory WHERE supplierId = :supplierId');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function countAcceptedBids()
    {
        $this->db->query('SELECT * FROM bidtable WHERE supplierId = :supplierId AND status = "accepted"');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $this->db->rowCount();
    }

    public function getInventoryQuantity($data)
    {

    $this->db->query('SELECT SUM(quantity) AS total_quantity FROM supplierinventory WHERE medicineId = :id');
    // Bind value
    $this->db->bind(':id', $data['medicineId']);
    $row = $this->db->single();
    
    if ($row) {
        return $row->total_quantity;
    } else {
        return 0; // or handle the error as needed
    }

        
    }

    public function getProfileData($id)
    {
        $this->db->query('SELECT * FROM supplierregistration WHERE id = (SELECT userId FROM users WHERE id = :id)'); 
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateProfile($data)
    {
        $this->db->query('UPDATE supplierregistration SET email = :email, password = :password WHERE id = (SELECT userId FROM users WHERE id = :id)');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['newpassword']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProfileInUsers($data)
    {
        $this->db->query('UPDATE users SET email = :email, password = :password WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['newpassword']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function getMessages()
    {
        $this->db->query('SELECT * FROM messages WHERE receiver = :receiver');
        $this->db->bind(':receiver', $_SESSION['USER_DATA']['name']);
        $results = $this->db->resultSet();
        return $results;
    }
    
    public function getMessageDetails($id)
    {
        $this->db->query('SELECT * FROM messages WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function sendMessage($data)
    {
        $this->db->query('INSERT INTO messages (sender, receiver, heading, message) VALUES (:sender, :receiver, :subject, :message)');
        // Bind values
        $this->db->bind(':sender', $data['sender']);
        $this->db->bind(':receiver', $data['receiver']);
        $this->db->bind(':subject', $data['heading']);
        $this->db->bind(':message', $data['message']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getGoingToExpireMedicines()
    {
        $this->db->query('SELECT * FROM supplierinventory WHERE supplierId = :supplierId AND expireDate <= CURDATE() OR expireDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 14 DAY) ORDER BY expireDate ASC');
        $this->db->bind(':supplierId', $_SESSION['USER_DATA']['id']);
        $results = $this->db->resultSet();
        return $results;
    }

    public function removeExpiredMedicine($id)
    {
        $this->db->query('DELETE FROM supplierinventory WHERE id = :id');
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

