<?php
class Suppliers extends Controller
{
    public $supplierModel;
    public function __construct()
    {
        $this->supplierModel = $this->model('Supplier');
        if (!Auth::is_supplier()) {
            redirect('users/login');
        }
    }


    public function index()
    {

        $data = [
            'countOrders' => $this->supplierModel->countOrders(),
            'countTotalOrders' => $this->supplierModel->countTotalOrders(),
            'countMedicines' => $this->supplierModel->countMedicines(),
            'countGoingToExpireMedicine' => $this->supplierModel->countGoingToExpireMedicine(),
            'countAcceptedBids' => $this->supplierModel->countAcceptedBids(),
            'countEachMedicine' => $this->supplierModel->countEachMedicine()
        ];

        $this->view('supplier/index', $data);
    }

    public function expiremedicines()
    {
        
        $goingToExpireMedicines = $this->supplierModel->getGoingToExpireMedicines();

        $data = [
            'expiredmedicines' => $goingToExpireMedicines
        ];

       

        $this->view('supplier/expiremedicines', $data);
    }

    
   

    public function inventory()
    {
        $data = [
            'supplierinventory' => $this->supplierModel->getInventory()
        ];
    
        $this->view('supplier/inventory', $data);
    }




    public function addinventory($id) {
        $brand = $this->supplierModel->getBrandById($id);
     
        $data = [
            'brands' => $brand,
            'medicine' => $this->supplierModel->getMedicineById($id),
            'quantity_err' => '',
            'batchNo_err' => '',
            'manufacturedDate_err' => '',
            'expireDate_err' => ''
            
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'brands' => $brand,
                'medicine' => $this->supplierModel->getMedicineById($id),
                'medicineId' => trim($_POST['medicineId']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNo' => trim($_POST['batchNo']),
                'volume' => trim($_POST['volume']),
                'brand' => trim($_POST['brand']),
                'type' => trim($_POST['type']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'manufacturedDate' => trim($_POST['manufacturedDate']),
                'expireDate' => trim($_POST['expireDate']),
                'supplierId' => trim($_SESSION['USER_DATA']['id']),
                'quantity_err' => '',
                'batchNo_err' => '',
                'manufacturedDate_err' => '',
                'expireDate_err' => ''
            ];

            // Validate data
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            if (empty($data['batchNo'])) {
                $data['batchNo_err'] = 'Please enter batch number';
            } elseif ($data['batchNo'] === 'BCH' || !preg_match('/^BCH[0-9]{6}$/', $data['batchNo'])) {
                $data['batchNo_err'] = 'Batch number should start with "BCH" followed by 6 digits';
            }

            //check batch number is exist
            if ($this->supplierModel->checkBatchNo($data)) {
                $data['batchNo_err'] = 'Batch number is already exist';
            }

            if (empty($data['manufacturedDate'])) {
                $data['manufacturedDate_err'] = 'Please enter manufactured date';
            }

            if (empty($data['expireDate'])) {
                $data['expireDate_err'] = 'Please enter expire date';
            }

            //check manufactured date should be passed
            if ($data['manufacturedDate'] > date('Y-m-d')) {
                $data['manufacturedDate_err'] = 'Manufactured date should be passed';
            }

            //check expire date should be greater than manufactured date
            if ($data['expireDate'] < $data['manufacturedDate']) {
                $data['expireDate_err'] = 'Expire date should be greater than manufactured date';
            }


            // Make sure no errors
            if (empty($data['quantity_err']) && empty($data['batchNo_err']) && empty($data['manufacturedDate_err']) && empty($data['expireDate_err'])) {

                // Input data
                if ($this->supplierModel->addInventory($data)) {
                    redirect('suppliers/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('supplier/addinventory', $data);
            }

        }

        $this->view('supplier/addinventory', $data);
    }




    public function messages()
    {
        $getMessages = $this->supplierModel->getMessages();
        $data = [
            'getMessages' => $getMessages
        ];
        $this->view('supplier/messages', $data);
    }
    public function advertistments()
    {
        $data = [];
        $this->view('supplier/advertistments', $data);
    }

    public function sendmessage($id)
    {

        $getMessageDetails = $this->supplierModel->getMessageDetails($id);
        $data = [
            'getMessageData' => $getMessageDetails,
            'message_err' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'getMessageData' => $getMessageDetails,
                'message' => trim($_POST['message']),
                'id' => trim($_POST['id']),
                'sender' => trim($_POST['sender']),
                'pharmacyId' => trim($_POST['pharmacyId']),
                'receiver' => trim($_POST['receiver']),
                'heading' => trim($_POST['heading']),
                'message_err' => ''
            ];

            // Validate data
            if (empty($data['message'])) {
                $data['message_err'] = 'Please enter message';
            }

            // Make sure no errors
            if (empty($data['message_err'])) {

                // Input data
                if ($this->supplierModel->sendMessage($data)) {
                    redirect('suppliers/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('supplier/sendmessage', $data);
            }

        }
        $this->view('supplier/sendmessage', $data);
    }


    public function place_bid($id)
    {
        //get order by id
        $orderDetails = $this->supplierModel->getOrderById($id);
        $data = [
            'orderDetails' => $orderDetails,
            'request_order_details' => $this->supplierModel->getOrderById($id),
            'bidAmount_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'orderDetails' => $orderDetails,
                'request_order_details' => $this->supplierModel->getOrderById($id),
                'orderId' => trim($_POST['orderId']),
                'medicineId' => trim($_POST['medicineId']),
                'pharmacyId' => trim($_POST['pharmacyId']),
                'pharmacyName' => trim($_POST['pharmacyName']),
                'type' => trim($_POST['type']),
                'volume' => trim($_POST['volume']),
                'orderedDate' => trim($_POST['orderedDate']),
                'quantity' => trim($_POST['quantity']),
                'medicineName' => trim($_POST['medicineName']),
                'brand' => trim($_POST['brand']),
                'category' => trim($_POST['category']),
                'bidAmount' => trim($_POST['bidAmount']),
                'remarks' => trim($_POST['remarks']),
                'deliveryDate' => trim($_POST['deliveryDate']),
                'supplierId' => trim($_SESSION['USER_DATA']['id']),
                'supplierName' => trim($_SESSION['USER_DATA']['name']),
                'bidAmount_err' => '',
                'remarks_err' => ''
            ];

            // Validate data
            if (empty($data['bidAmount'])) {
                $data['bidAmount_err'] = 'Please enter bid amount';
            } 

        
            if (empty($data['remarks'])) {
                $data['remarks_err'] = 'Please enter remarks';
            }

          

            // Make sure no errors
            if (empty($data['bidAmount_err'])) {

                // Input data and change status to approved
                if ($this->supplierModel->acceptBid($data) && $this->supplierModel->updateOrderStatus($data)) {
                    redirect('suppliers/orders');
                } else {
                    die('Something went wrong');
                }
            } else {

            
                // Load view
                $this->view('supplier/place_bid', $data);
            }
        }
        //load the data to the view
        // Load view
        $this->view('supplier/place_bid', $data);
    }

   


    public function orders()
    {
        $order = $this->supplierModel->getOrder();
        $getAcceptBid = $this->supplierModel->getAcceptBid();
        $getApprovedBid = $this->supplierModel->getApprovedBid();

        $data = [
            'order' => $order,
            'getAcceptBid' => $getAcceptBid,
            'getApprovedBid' => $getApprovedBid,
            'search' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $searchTerm = trim($_POST['search']);

            $order= $this->supplierModel->searchOrder($searchTerm);

            $data = [
                'order' => $order,
                'getAcceptBid' => $getAcceptBid,
                'getApprovedBid' => $getApprovedBid,
                'search' => $searchTerm
            ];

            $this->view('supplier/orders', $data);
        }
        $this->view('supplier/orders', $data);
    }

    public function showAcceptedOrderDetails($id)
    {
        $orderDetails = $this->supplierModel->getAcceptedOrderById($id);
        $data = [
            'orderDetails' => $orderDetails
        ];
        $this->view('supplier/showAcceptedOrderDetails', $data);
    }

    public function showApprovedOrderDetails($id)
    {
        $orderDetails = $this->supplierModel->getApprovedOrderById($id);
        $data = [
            'orderDetails' => $orderDetails
        ];
        $this->view('supplier/showApprovedOrderDetails', $data);
    }

    public function deliverOrder($id)
    {
      
        //get inventory data from inventory table that matches the details of the order
      
        $approvedOrderDetails = $this->supplierModel->getApprovedOrderById($id);
        $inventoryitem = $this->supplierModel->getInventoryItemMatchWithDeliverOrder($id);
        $totalQuantity = $this->supplierModel->getTotalQuantity($id);
        
        $data = [
            'orderDetails' => $approvedOrderDetails ,
            'inventoryitem' => $inventoryitem ,
            'quantity_err' => '',
            'totalQuantity' => $totalQuantity
        ];
       


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'orderDetails' => $approvedOrderDetails,
                'inventoryitem' => $inventoryitem,
                'totalQuantity' => $totalQuantity,
                'supplierId' => $_SESSION['USER_DATA']['id'],
                'medicineId' => trim($_POST['medicineId']),
                'orderId' => trim($_POST['orderId']),
                'supplierName' => $_SESSION['USER_DATA']['name'],
                'medicineName' => trim($_POST['medicineName']),
                'type' => trim($_POST['type']),
                'brand' => trim($_POST['brand']),
                'category' => trim($_POST['category']),
                'volume' => trim($_POST['volume']),
                'quantity' => trim($_POST['quantity']),
                'pharmacyId' => trim($_POST['pharmacyId']),
                'pharmacyName' => trim($_POST['pharmacyName']),
                'quantity_err' => ''
            
            ];

            // Validate data
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            if (empty($data['brand'])) {
                $data['quantity_err'] = 'Please enter brand';
            }

            // check medicine id is exist
            if (!$this->supplierModel->isAvailableMedicine($data)) {
                $data['quantity_err'] = 'Medicine or Brand is not exist in your inventory';
            }



            //validate order quantity is greater than inventory quantity
            $medicineStock = $this->supplierModel->getSameMedicineStock($data);
            if ($data['quantity'] > $medicineStock->total_quantity) {
                $data['quantity_err'] = 'You do not have enough quantity in your inventory to deliver this order';
            }

            // Make sure no errors
            if (empty($data['quantity_err'])) {
                // Input data
                if ($this->supplierModel->deliverOrder($data)) {
                    //update order status to delivered
                    $this->supplierModel->changestatustoDelivered($data);
                    redirect('suppliers/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('supplier/deliverdetail', $data);
            }
        }
        
        // Load view
        $this->view('supplier/deliverdetail', $data);
    }

    
    public function cancelBid($id)
    {

        $data = [
            'id' => $id,
            'supplierId' => $_SESSION['USER_DATA']['id'],
        ];

        if ($this->supplierModel->cancelBid($data)) {
            redirect('suppliers/orders');
        } else {
            die('Something went wrong');
        }
    }

    public function rejectBid($id)
    {
        $approvedOrderDetails = $this->supplierModel->getApprovedOrderById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'supplierId' => $_SESSION['USER_DATA']['id'],
                'orderDetails' => $approvedOrderDetails,
                'reason' => trim($_POST['reason']),     
                'reason_err' => ''
            ];

            // Validate
            if (empty($data['reason'])) {
                $data['reason_err'] = 'Please enter reason';
            }

            if (empty($data['reason_err'])) {
                if ($this->supplierModel->rejectBid($data)) {
                    redirect('suppliers/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('supplier/rejectBid', $data);
            }
        } else {
            $data = [
                'orderDetails' => $approvedOrderDetails
            ];
            $this->view('supplier/rejectBid', $data);
        }
    }

    public function history()
    {
        $data = [
            'id' => $_SESSION['USER_DATA']['id'] 
        ];
       
        $getDeliveredOrder = $this->supplierModel->getDeliveredOrders($data);
        $getRejectedOrder = $this->supplierModel->getRejectedOrders($data);
        $getCancelledOrder = $this->supplierModel->getCancelledOrders();


        $data = [
            'id' => $_SESSION['USER_DATA']['id'] ,
            'getDeliveredOrder' => $getDeliveredOrder,
            'getRejectedOrder' => $getRejectedOrder,
            'getCancelledOrder' => $getCancelledOrder
        ];
        $this->view('supplier/history', $data);
    }
  




    //new changes

    public function medicinestock($id)
    {
        $brand = $this->supplierModel->getBrandById($id);
        $data = [
            'medicinestock' => $this->supplierModel->getMedicineStock($id),
            'quantity_err' => '',
            'batchNo_err' => '',
            'manufacturedDate_err' => '',
            'expireDate_err' => '',
            'brands' => $brand
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

           
            $data = [
                'medicinestock' => $this->supplierModel->getMedicineStock($id),
                'brands' => $brand,
                'medicineId' => trim($_POST['medicineId']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNo' => trim($_POST['batchNo']),
                'volume' => trim($_POST['volume']),
                'brand' => trim($_POST['brand']),
                'type' => trim($_POST['type']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'manufacturedDate' => trim($_POST['manufacturedDate']),
                'expireDate' => trim($_POST['expireDate']),
                'supplierId' => trim($_SESSION['USER_DATA']['id']),
                'quantity_err' => '',
                'batchNo_err' => '',
                'manufacturedDate_err' => '',
                'expireDate_err' => ''

            ];

            // Validate data
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            if (empty($data['batchNo'])) {
                $data['batchNo_err'] = 'Please enter batch number';
            }

            //check batch number is exist
            if ($this->supplierModel->checkBatchNo($data)) {
                $data['batchNo_err'] = 'Batch number is already exist';
            }

            if (empty($data['manufacturedDate'])) {
                $data['manufacturedDate_err'] = 'Please enter manufactured date';
            }

            if (empty($data['expireDate'])) {
                $data['expireDate_err'] = 'Please enter expire date';
            }

            //check manufactured date should be passed
            if ($data['manufacturedDate'] > date('Y-m-d')) {
                $data['manufacturedDate_err'] = 'Manufactured date should be passed';
            }

            //check expire date should be greater than manufactured date
            if ($data['expireDate'] < $data['manufacturedDate']) {
                $data['expireDate_err'] = 'Expire date should be greater than manufactured date';
            }


            // Make sure no errors
            if (empty($data['quantity_err']) && empty($data['batchNo_err']) && empty($data['manufacturedDate_err']) && empty($data['expireDate_err'])) {

                // Input data
                if ($this->supplierModel->addMedicineStock($data)) {
                    redirect('suppliers/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('supplier/medicinestock', $data);
            }

        }

        // Load view
        $this->view('supplier/medicinestock', $data);
    }


    public function viewinventory($id)
    {

        $data = [
            'samemedicineinventory' => $this->supplierModel->getSameMedicineInventory($id)
        ];

        $this->view('supplier/viewinventory', $data);
    }

    public function addmedicineinventory()
    {

        $data = [
            'medicine' => $this->supplierModel->getMedicines()
        ];
        $this->view('supplier/addmedicineinventory', $data);
    }

    public function profile() {

        $id = $_SESSION['USER_DATA']['id'];
        $getProfileData = $this->supplierModel->getProfileData($id);

        $data =[
        'getProfileData' => $getProfileData

        ];

        $this->view('supplier/profile', $data);
    }

    public function editprofile() {
        $id = $_SESSION['USER_DATA']['id'];
        $getProfileData = $this->supplierModel->getProfileData($id);

        $data =[
        'getProfileData' => $getProfileData,
        'email_err' => '',
        'oldpassword_err' => '',
        'newpassword_err' => ''

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_SESSION['USER_DATA']['id'],
                'email' => trim($_POST['email']),
                'oldpassword' => trim($_POST['oldpassword']),
                'newpassword' => trim($_POST['newpassword']),
                'getProfileData' => $getProfileData,
                'email_err' => '',
                'oldpassword_err' => '',
                'newpassword_err' => ''
            ];

            // Validate data
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            if (empty($data['oldpassword'])) {
                $data['oldpassword_err'] = 'Please enter old password';
            }

            if (empty($data['newpassword'])) {
                $data['newpassword_err'] = 'Please enter new password';
            }

            //check old password is correct
            if (!$data['oldpassword']== $data['getProfileData']->password) {
                $data['oldpassword_err'] = 'Old password is incorrect';
            }

            // Make sure no errors
            if (empty($data['email_err']) && empty($data['oldpassword_err']) && empty($data['newpassword_err'])) {

                // Input data
                if ($this->supplierModel->updateProfile($data)) {
                    $this->supplierModel->updateProfileInUsers($data);
                    redirect('suppliers/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('supplier/editprofile', $data);
            }

        }
        $this->view('supplier/editprofile', $data);
    }


    public function logout()
    {
        unset($_SESSION['USER_DATA']);
        redirect('users/login');
    }
}
