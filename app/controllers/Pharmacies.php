<?php
class Pharmacies extends Controller
{

    public $pharmacyModel;
    private $db;

    public function __construct()
    {
        $this->pharmacyModel = $this->model('Pharmacy');
        if (!Auth::is_pharmacy()) {
            redirect('users/login');
        }          
       
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Dashboard Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        // Get the pharmacy ID from the session
        $pharmacyId = $_SESSION['USER_DATA']['id'];

        // Get the current date in the format "YYYY-MM-DD"
        $currentDate = date("Y-m-d");

        // Call the model methods to count various statistics
        $countTotalOngoingOrders = $this->pharmacyModel->countTotalOngoingOrders($pharmacyId);
        $countPendingOrders = $this->pharmacyModel->countPendingOrders($pharmacyId);
        $countAcceptedOrders = $this->pharmacyModel->countAcceptedOrders($pharmacyId);
        $countApprovedOrders = $this->pharmacyModel->countApprovedOrders($pharmacyId);
        $countReceivedOrders = $this->pharmacyModel->countReceivedOrders($pharmacyId);
        $countRejectedOrders = $this->pharmacyModel->countRejectedOrders($pharmacyId);
        $countCancelledOrders = $this->pharmacyModel->countCancelledOrders($pharmacyId);
        $countTotalMedicines = $this->pharmacyModel->countTotalMedicines($pharmacyId);
        $countTotalMedicineQuantity = $this->pharmacyModel->countTotalMedicineQuantity($pharmacyId);
        $countNearExpireDateMedicines = $this->pharmacyModel->countNearExpireDateMedicines($pharmacyId);
        $countWorthOfInventory = $this->pharmacyModel->countWorthOfInventory($pharmacyId);
        

        // Prepare the data to pass to the view
        $data = [
            'countTotalOngoingOrders' => $countTotalOngoingOrders,
            'countPendingOrders' => $countPendingOrders,
            'countAcceptedOrders' => $countAcceptedOrders,
            'countApprovedOrders' => $countApprovedOrders,
            'countRejectedOrders' => $countRejectedOrders,
            'countReceivedOrders' => $countReceivedOrders,
            'countCancelledOrders' => $countCancelledOrders,
            'countTotalMedicines' => $countTotalMedicines,
            'countTotalMedicineQuantity' => $countTotalMedicineQuantity,
            'countNearExpireDateMedicines' => $countNearExpireDateMedicines,
            'countWorthOfInventory' => $countWorthOfInventory,
        ];

        // Load the view with the data
        $this->view('pharmacy/dashboard/index', $data);
    }


    public function ongoingOrders()
    {    
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);
        
        $ongoingOrders = $this->pharmacyModel->ongoingOrders($pharmacyId);

        $data = [
            'ongoingOrders' => $ongoingOrders
        ];

        $this->view('pharmacy/dashboard/ongoingOrders', $data);
    }

    public function pendingOrders()
    {

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $pendingOrders = $this->pharmacyModel->pendingOrders($pharmacyId);

        $data = [
            'pendingOrders' => $pendingOrders
        ];

        $this->view('pharmacy/dashboard/pendingOrders', $data);
    }

    public function acceptedOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $acceptedOrders = $this->pharmacyModel->acceptedSupplierOrders($pharmacyId);

        $data = [
            'acceptedOrders' => $acceptedOrders
        ];

        $this->view('pharmacy/dashboard/acceptedOrders', $data);
    }

    public function approvedOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $approvedOrders = $this->pharmacyModel->approvedOrders($pharmacyId);

        $data = [
            'approvedOrders' => $approvedOrders
        ];

        $this->view('pharmacy/dashboard/approvedOrders', $data);
    }

    public function receivedOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $receivedOrders = $this->pharmacyModel->receivedOrders($pharmacyId);

        $data = [
            'receivedOrders' => $receivedOrders
        ];

        $this->view('pharmacy/dashboard/receivedOrders', $data);
    }


    public function rejectedOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $rejectedOrders = $this->pharmacyModel->rejectedOrders($pharmacyId);

        $data = [
            'rejectedOrders' => $rejectedOrders
        ];

        $this->view('pharmacy/dashboard/rejectedOrders', $data);
    }

    public function cancelledOrders()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $cancelledOrders = $this->pharmacyModel->cancelOrders($pharmacyId);

        $data = [
            'cancelledOrders' => $cancelledOrders
        ];

        $this->view('pharmacy/dashboard/cancelledOrders', $data);
    }

    public function totalMedicines()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $totalMedicines = $this->pharmacyModel->totalMedicines($pharmacyId);

        $data = [
            'totalMedicines' => $totalMedicines
        ];

        $this->view('pharmacy/dashboard/totalMedicines', $data);
    }

    public function nearExpireDateMedicines()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $nearExpireDateMedicines = $this->pharmacyModel->nearExpireDateMedicines($pharmacyId);

        $data = [
            'nearExpireDateMedicines' => $nearExpireDateMedicines
        ];

        $this->view('pharmacy/dashboard/nearExpireDateMedicines', $data);
    }

    public function worthOfInventory()
    {
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $worthOfInventory = $this->pharmacyModel->worthOfInventory($pharmacyId);

        $data = [
            'worthOfInventory' => $worthOfInventory
        ];

        $this->view('pharmacy/dashboard/worthOfInventory', $data);
    }



    

    public function todaysCustomerOrders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);
        $currentDate = date("Y-m-d");

        $todaysCustomerOrders = $this->pharmacyModel->todaysCustomerOrders($pharmacyId, $currentDate);

        $data = [
            'todaysCustomerOrders' => $todaysCustomerOrders
        ];

        $this->view('pharmacy/dashboard/todaysCustomerOrders', $data);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Inventory Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function inventory()
    {
        $data = [
            'inventory' => $this->pharmacyModel->getInventory(),
            'search' => ''

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get search term
            $searchTerm = trim($_POST['search']);

            // Get medicines based on search term
            $getMedicines = $this->pharmacyModel->getSearchMedicine($searchTerm);

            $data1 = [
                'inventory' => $getMedicines,
                'search' => trim($_POST['search'])
            ];

            $data['inventory'] = $this->pharmacyModel->getInventory($data1);
        }

        $this->view('pharmacy/inventory/inventory', $data);
    }

    public function registeredMedicines()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $registeredMedicines = $this->pharmacyModel->getRegisteredMedicines();
        $registerdMedicineBrands = $this->pharmacyModel->getRegisteredMedicineBrands();

        $data = [
            'registeredMedicines' => $registeredMedicines,
            'registerdMedicineBrands' => $registerdMedicineBrands
        ];

        $this->view('pharmacy/inventory/registeredMedicines', $data);
    }

    public function medicinestock($id)
    {
        $brand = $this->pharmacyModel->getBrandById($id);
        $medicine = $this->pharmacyModel->getMedicineById($id);
        $data = [
            'medicinestock' => $this->pharmacyModel->getMedicineStock($id),
            'quantity_err' => '',
            'batchNo_err' => '',
            'manufacturedDate_err' => '',
            'expireDate_err' => '',
            'brands' => $brand,
            'medicine' => $medicine
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
                'medicinestock' => $this->pharmacyModel->getMedicineStock($id),
                'brands' => $brand,
                'medicine' => $medicine,
                'medicineId' => trim($_POST['medicineId']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNo' => trim($_POST['batchNo']),
                'refno' => trim($_POST['refno']),
                'volume' => trim($_POST['volume']),
                'brand' => trim($_POST['brand']),
                'type' => trim($_POST['type']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'manufacturedDate' => trim($_POST['manufacturedDate']),
                'expireDate' => trim($_POST['expireDate']),
                'unitPrice' => trim($_POST['unitPrice']),
                'description' => trim($_POST['description']),
                'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
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
            // if ($this->pharmacyModel->checkBatchNo($data)) {
            //     $data['batchNo_err'] = 'Batch number is already exist';
            // }

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
                if ($this->pharmacyModel->addMedicineStock($data)) {
                    redirect('pharmacies/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('pharmacy/inventory/medicinestock', $data);
            }
        }

        // Load view
        $this->view('pharmacy/inventory/medicinestock', $data);
    }

    public function viewinventory($id)
    {

        $data = [
            'samemedicineinventory' => $this->pharmacyModel->getSameMedicineInventory($id)
        ];

        $this->view('pharmacy/inventory/viewinventory', $data);
    }

    public function addmedicineinventory()
    {

        $data = [
            'medicine' => $this->pharmacyModel->getMedicines()
        ];
        $this->view('pharmacy/inventory/addmedicineinventory', $data);
    }


    public function showInventoryBrandDetails($name)
    {
        // Fetch the inventory item by its ID
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);
        $inventoryItems = $this->pharmacyModel->getInventoryItemsByName($pharmacyId, $name);

        $data = [
            'inventoryItem' => $inventoryItems
        ];

        // Load view with inventory item data
        $this->view('pharmacy/inventory/showInventoryBrandDetails', $data);
    }

    public function addinventory($id)
    {
        $brand = $this->pharmacyModel->getBrandById($id);
        $medicine = $this->pharmacyModel->getMedicineById($id);

        $data = [
            'brands' => $brand,
            'medicine' => $medicine,
            'medicine' => $this->pharmacyModel->getMedicineById($id),
            'quantity_err' => '',
            'unitPrice_err' => '',
            'brand_err' => '',
            'batchNo_err' => '',
            'manufacturedDate_err' => '',
            'expireDate_err' => '',
            'description_err' => ''

        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'brands' => $brand,
                'medicine' => $medicine,
                'medicine' => $this->pharmacyModel->getMedicineById($id),
                'medicineId' => trim($_POST['medicineId']),
                'refno' => trim($_POST['refno']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNo' => trim($_POST['batchNo']),
                'volume' => trim($_POST['volume']),
                'brand' => trim($_POST['brand']),
                'type' => trim($_POST['type']),
                'quantity' => trim($_POST['quantity']),
                'category' => trim($_POST['category']),
                'description' => trim($_POST['description']),
                'manufacturedDate' => trim($_POST['manufacturedDate']),
                'expireDate' => trim($_POST['expireDate']),
                'unitPrice' => trim($_POST['unitPrice']),
                'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
                'quantity_err' => '',
                'unitPrice_err' => '',
                'brand_err' => '',
                'batchNo_err' => '',
                'manufacturedDate_err' => '',
                'expireDate_err' => '',
                'description_err' => ''
            ];

            // Validate data
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            // Validate batch number
            if (empty($data['batchNo'])) {
                $data['batchNo_err'] = 'Please enter batch number';
            } elseif ($data['batchNo'] === 'BCH' || !preg_match('/^BCH[0-9]{6}$/', $data['batchNo'])) {
                $data['batchNo_err'] = 'Batch number should start with "BCH" followed by 6 digits';
            }


            //check batch number is exist
            if ($this->pharmacyModel->checkBatchNo($data)) {
                $data['batchNo_err'] = 'Batch number is already exist';
            }

            if (empty($data['brand'])) {
                $data['brand_err'] = 'Please enter brand';
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

            if (empty($data['unitPrice'])) {
                $data['unitPrice_err'] = 'Please enter the unit price of this medicine';
            }

            if (empty($data['description'])) {
                $data['description_err'] = 'Please describe the medicine';
            }

            // Make sure no errors
            if (empty($data['quantity_err']) && empty($data['batchNo_err']) && empty($data['brand_err']) && empty($data['manufacturedDate_err']) && empty($data['expireDate_err']) && empty($data['unitPrice_err']) && empty($data['description_err'])) {

                // Input data
                if ($this->pharmacyModel->addInventory($data)) {
                    $data['inventory_added'] = true;
                    redirect('pharmacies/inventory');
                } else {
                    $data['inventory_added'] = false;
                    die('Something went wrong');
                }
            } else {
                // Load view
                $this->view('pharmacy/inventory/addinventory', $data);
            }
        }

        $this->view('pharmacy/inventory/addinventory', $data);
    }


    public function showInventoryDetails($id)
    {
        // Fetch the inventory item by its ID
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);
        $inventoryItem = $this->pharmacyModel->getInventoryItemById($id, $pharmacyId);

        $data = [
            'inventoryItem' => $inventoryItem
        ];

        // Load view with inventory item data
        $this->view('pharmacy/inventory/showInventoryDetails', $data);
    }



    // public function editInventory() according to the addInventory function
    public function editInventory($inventoryId)
    {
        // print_r($_POST);
        // Fetch the inventory item by its ID


        $inventory_item = $this->pharmacyModel->getInventoryItemById($inventoryId);
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $data = [
            'inventory_item' => $inventory_item
        ];

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Process form data

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data array
            $data = [
                'id' => $inventoryId, // Inventory item ID
                'inventory_item' => $inventory_item,
                'pharmacyId' => $pharmacyId,
                'refno' => trim($_POST['refno']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNo' => trim($_POST['batchNo']),
                'category' => trim($_POST['category']),
                'volume' => trim($_POST['volume']),
                'type' => trim($_POST['type']),
                'brand' => trim($_POST['brand']),
                'quantity' => trim($_POST['quantity']),
                'unitPrice' => trim($_POST['unitPrice']),
                'manufacturedDate' => trim($_POST['manufacturedDate']),
                'expireDate' => trim($_POST['expireDate']),
                'description' => trim($_POST['description']),
                'refno_err' => '',
                'medicineName_err' => '',
                'batchNo_err' => '',
                'category_err' => '',
                'volume_err' => '',
                'type_err' => '',
                'brand_err' => '',
                'quantity_err' => '',
                'manufacturedDate_err' => '',
                'expireDate_err' => '',
                'unitPrice_err' => '',
                'description_err' => '',
            ];

            // Validate data
            if (empty($data['refno'])) {
                $data['refno_err'] = 'Please enter refno';
            }

            if (empty($data['medicineName'])) {
                $data['medicineName'] = 'Please enter medicine name';
            }

            if (empty($data['batchNo'])) {
                $data['batchNo_err'] = 'Please enter batch number';
            } elseif (!preg_match('/^BCH.{6}$/', $data['batchNo'])) {
                $data['batchNo_err'] = 'Batch number should start with BCH followed by 6 digits';
            }

            if (empty($data['category'])) {
                $data['category_err'] = 'Please enter category of the medicine';
            }

            if (empty($data['volume'])) {
                $data['volume_err'] = 'Please enter volume';
            }

            if (empty($data['type'])) {
                $data['type_err'] = 'Please enter type';
            }

            if (empty($data['brand'])) {
                $data['brand_err'] = 'Please enter brand';
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter valid quantity';
            }

            if (empty($data['unitPrice'])) {
                $data['unitPrice_err'] = 'Please enter the unit price of this medicine';
            }

            if (empty($data['manufacturedDate'])) {
                $data['manufacturedDate_err'] = 'Please enter manufacture date medicine';
            }

            if (empty($data['expireDate'])) {
                $data['expireDate_err'] = 'Please enter expire date of the medicine';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Please describe the medicine';
            }

            // Make sure no errors
            if (empty($data['ref_err']) && empty($data['medicineName_err']) && empty($data['batchNo_err']) && empty($data['category_err']) && empty($data['volume_err']) && empty($data['type_err']) && empty($data['brand_err']) && empty($data['quantity_err']) && empty($data['manufacturedDate_err']) && empty($data['expireDate_err']) && empty($data['unitPrice_err']) && empty($data['description_err'])) {
                // Validated

                // Call the model function to update inventory item
                if ($this->pharmacyModel->editInventory($data)) {
                    // Redirect to inventory page after successful update
                    redirect('pharmacies/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with inventory item data for editing
                $this->view('pharmacy/inventory/editInventory', $data);
            }
        }

        // Load view with inventory item data for editing
        $this->view('pharmacy/inventory/editInventory', $data);
    }

    public function removeInventory($id)
    {
        // Call the model function to delete the inventory item
        if ($this->pharmacyModel->removeInventory($id)) {
            // Redirect to inventory page after successful deletion
            redirect('pharmacies/inventory');
        } else {
            die('Something went wrong');
        }
    }


    public function changeInventory($id)
    {
        $inventoryItem = $this->pharmacyModel->getInventoryItemById($id);
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $data = [
            'inventoryItem' => $inventoryItem
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'inventoryItem' => $inventoryItem,
                'pharmacyId' => $pharmacyId,
                'id' => $id,
                'quantity' => trim($_POST['quantity']),
                'quantity_err' => ''
            ];

            // Validate data
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            // Make sure no errors
            if (empty($data['quantity_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->changeInventory($data)) {
                    // Redirect to inventory
                    redirect('pharmacies/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/inventory/changeInventory', $data);
            }
        }

        // Load view
        $this->view('pharmacy/inventory/changeInventory', $data);
    }

    public function reduceInventory($id)
    {
        $inventoryItem = $this->pharmacyModel->getInventoryItemById($id);
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $data = [
            'inventoryItem' => $inventoryItem
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'inventoryItem' => $inventoryItem,
                'pharmacyId' => $pharmacyId,
                'id' => $id,
                'quantity' => trim($_POST['quantity']),
                'quantity_err' => ''
            ];

            // Validate data
            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            } elseif ($data['quantity'] > $data['inventoryItem']->quantity) {
                $data['quantity_err'] = 'Quantity should be less than or equal to the current quantity';
            }

            // Make sure no errors
            if (empty($data['quantity_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->reduceInventory($data)) {
                    // Redirect to inventory
                    redirect('pharmacies/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/inventory/reduceInventory', $data);
            }
        }

        // Load view
        $this->view('pharmacy/inventory/reduceInventory', $data);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Messages Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messages()
    {
        //Sanitize inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $messages = $this->pharmacyModel->getMessages($pharmacyId);
        $supplierList = $this->pharmacyModel->getSupplierList();
        $inboxmessages = $this->pharmacyModel->getInboxMessage();

        $data = [
            'messages' => $messages,
            'suppliers' => $supplierList,
            'inboxmessages' => $inboxmessages
        ];

        $this->view('pharmacy/notifications/messages', $data);
    }

    public function messageSupplier($id)
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $supplier = $this->pharmacyModel->getSupplierById($id);
        $supplierDetails = $this->pharmacyModel->getSupplierDetails($id);

        $data = [
            'supplier' => $supplier,
            'supplierDetails' => $supplierDetails,
            'receiver' => '',
            'topic_err' => '',
            'description_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Validate data
            $data = [
                'supplier' => $supplier,
                'supplierDetails' => $supplierDetails,
                'receiver' => trim($_POST['supplierEmail']),
                'topic' => trim($_POST['topic']),
                'description' => trim($_POST['description']),
                'receiver_err' => '',
                'topic_err' => '',
                'description_err' => ''
            ];

            // Validate data
            if (empty($data['topic'])) {
                $data['_err'] = 'Please enter the topic';
            }

            if (empty($data['description'])) {
                $data['message_err'] = 'Please enter the message';
            }

            // Make sure no errors
            if (empty($data['topic_err']) && empty($data['description_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->sendMessage($data)) {
                    // Redirect to order
                    redirect('pharmacies/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/notifications/messageSupplier', $data);
            }
        }

        $this->view('pharmacy/notifications/messageSupplier', $data);
    }

    public function newMessage()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'receiver' => trim($_POST['receiver']),
                'heading' => trim($_POST['heading']),
                'message' => trim($_POST['message']),
                'receiver_err' => '',
                'heading_err' => '',
                'message_err' => ''
            ];

            // Validate data
            if (empty($data['receiver'])) {
                $data['receiver_err'] = 'Please enter the recipient';
            }

            if (empty($data['heading'])) {
                $data['heading_err'] = 'Please enter the heading';
            }

            if (empty($data['message'])) {
                $data['message_err'] = 'Please enter the message';
            }

            // Make sure no errors
            if (empty($data['receiver_err']) && empty($data['heading_err']) && empty($data['message_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->addMessage($data)) {
                    // Redirect to order
                    redirect('pharmacies/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacies/messages', $data);
            }
        } else {
            // Init data
            $data = [
                'to' => '',
                'heading' => '',
                'message' => '',
                'to_err' => '',
                'heading_err' => '',
                'message_err' => ''
            ];

            // Load view
            $this->view('pharmacies/messages', $data);
        }
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Advertisement Function/////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function advertisements()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $advertisement = $this->pharmacyModel->getAdvertisement();

        $data = [
            'advertisement' => $advertisement
        ];

        $this->view('pharmacy/advertistments/advertistment', $data);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Supplier Order Function ////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function orders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $order = $this->pharmacyModel->getOrders();
        $acceptedOrders = $this->pharmacyModel->acceptedOrders();
        $selectedOrders = $this->pharmacyModel->selectedOrders();

        $data = [
            'order' => $order,
            'acceptedOrders' => $acceptedOrders,
            'selectedOrders' => $selectedOrders
        ];

        $this->view('pharmacy/supplierOrders/order', $data);
    }

    // public function generatePDF() {
    //     // Sanitize post inputs
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     $order = $this->pharmacyModel->getOrders();
    //     $acceptedOrders = $this->pharmacyModel->acceptedOrders();
    //     $selectedOrders = $this->pharmacyModel->selectedOrders();

    //     $data = [
    //         'order' => $order,
    //         'acceptedOrders' => $acceptedOrders,
    //         'selectedOrders' => $selectedOrders
    //     ];

    //     $this->view('pharmacy/supplierOrders/order', $data);

    //     $html = $this->view('pharmacy/supplierOrders/order', $data, true);

    //     $pdf = new Tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    //     $pdf->SetCreator(PDF_CREATOR);
    //     $pdf->SetAuthor('Pharmacy');
    //     $pdf->SetTitle('Orders');
    //     $pdf->SetSubject('Orders');
    //     $pdf->SetKeywords('Orders');

    //     $pdf->setPrintHeader(false);
    //     $pdf->setPrintFooter(false);

    //     $pdf->AddPage();

    //     $pdf->writeHTML($html, true, false, true, false, '');

    //     $pdf->Output('orders.pdf', 'I');
    // }


    public function changeStatusAsApproved($id)
    {

        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
            'bidId' => $id,
            'status' => trim($_POST['status']),
            'approvedDate' => date('Y-m-d   ')

        ];

        if ($this->pharmacyModel->changeStatus($data)) {
            redirect('pharmacies/orders');
        } else {
            die('Something went wrong');
        }
    }

    public function showAcceptedOrderDetails($id)
    {
        // Fetch the order by its ID
        $acceptedOrderDetails = $this->pharmacyModel->getAcceptedOrderById($id);

        $data = [
            'orderDetails' => $acceptedOrderDetails
        ];

        // Load view with inventory item data
        $this->view('pharmacy/supplierOrders/showAcceptedOrderDetails', $data);
    }


    public function changeOrderDetails($id)
    {
        // Fetch the order by its ID
        $order = $this->pharmacyModel->getOrderById($id);
        $medicine = $this->pharmacyModel->getMedicineById($order->medicine_id);
        $brand = $this->pharmacyModel->getBrandById($order->medicine_id);

        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form data

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data array
            $data = [
                'order' => $order,
                'id' => $id,
                'brand' => $brand,
                'medicine' => $medicine,
                'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
                'pharmacyName' => trim($_SESSION['USER_DATA']['name']),
                'brands' => trim($_POST['brand']),
                'deliveryDate' => trim($_POST['deliveryDate']),
                'quantity' => trim($_POST['quantity']),
                'brand_err' => '',
                'deliveryDate_err' => '',
                'quantity_err' => ''
            ];

            // Validate data
            if (empty($data['brand'])) {
                $data['brand_err'] = 'Please enter brand';
            }

            if (empty($data['deliveryDate'])) {
                $data['deliveryDate_err'] = 'Please enter delivery date';
            } elseif (strtotime($data['deliveryDate']) < strtotime(date('Y-m-d'))) {
                $data['deliveryDate_err'] = 'You entered a past date. Please enter a valid date.';
            }


            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            if (empty($data['brand_err']) && empty($data['deliveryDate_err']) && empty($data['quantity_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->changeOrderDetails($data)) {
                    // Redirect to order
                    redirect('pharmacies/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/supplierOrders/changeOrderDetails', $data);
            }
        } else {
            // Load view with inventory item data for editing
            $data = [
                'order' => $order,
                'brand' => $brand,
                'medicine' => $medicine,
                'brand_err' => '',
                'deliveryDate_err' => '', // Set default value for deliveryDate_err
                'quantity_err' => '' // Set default value for quantity_err
            ];

            $this->view('pharmacy/supplierOrders/changeOrderDetails', $data);
        }
    }

    public function addOrder()
    {
        //display medicine detail
        $medicine = $this->pharmacyModel->getRegisteredMedicines();

        $data = [
            'medicine' => $medicine,
            'search' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $searchTerm = $_POST['search'];

            $medicine = $this->pharmacyModel->searchMedicine($searchTerm);

            $data = [
                'medicine' => $medicine,
                'search' => $searchTerm,
            
            ];

        } 
            // Load view
            $this->view('pharmacy/supplierOrders/addorder', $data);
        
    }

    public function submitOrder($medicineId)
    {
        $medicine = $this->pharmacyModel->getMedicineById($medicineId);
        $brand = $this->pharmacyModel->getBrandById($medicineId);

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //print_r($_POST);

            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'medicine' => $medicine,
                'brand' => $brand,
                'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
                'pharmacyName' => trim($_SESSION['USER_DATA']['name']),
                'medicineId' => $medicineId,
                'medicineName' => trim($_POST['medicineName']),
                'refno' => trim($_POST['refno']),
                'category' => trim($_POST['category']),
                'volume' => trim($_POST['volume']),
                'type' => trim($_POST['type']),
                'brands' => trim($_POST['brand']),
                'deliveryDate' => trim($_POST['deliveryDate']),
                'quantity' => trim($_POST['quantity']),
                'medicineId_err' => '',
                'medicineName_err' => '',
                'refno_err' => '',
                'category_err' => '',
                'volume_err' => '',
                'type_err' => '',
                'brand_err' => '',
                'deliveryDate_err' => '',
                'quantity_err' => ''
            ];

            // Validate data
            if (empty($data['medicineId'])) {
                $data['medicineId_err'] = 'Please enter medicine id';
            }

            if (empty($data['medicineName'])) {
                $data['medicineName'] = 'Please enter medicine name';
            }

            if (empty($data['refno'])) {
                $data['refno_err'] = 'Please enter ref number';
            }

            if (empty($data['catergory'])) {
                $data['catergory_err'] = 'Please enter category';
            }

            if (empty($data['volume'])) {
                $data['volume_err'] = 'Please enter volume';
            }

            if (empty($data['type'])) {
                $data['type_err'] = 'Please enter type';
            }

            if (empty($data['brand'])) {
                $data['brand_err'] = 'Please enter brand';
            }

            if (empty($data['deliveryDate'])) {
                $data['deliveryDate_err'] = 'Please enter delivery date';
            } elseif (strtotime($data['deliveryDate']) < strtotime(date('Y-m-d'))) {
                $data['deliveryDate_err'] = 'You entered a past date. Please enter a valid date.';
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            // Repeat validation for other fields...

            // Make sure no errors
            if (empty($data['brand_err']) && empty($data['deliveryDate_err']) && empty($data['quantity_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->submitOrder($data)) {
                    // Redirect to order
                    redirect('pharmacies/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/supplierOrders/submitOrder', $data);
            }
        } else {
            // Init data
            $data = [
                'medicine' => $medicine,
                'brand' => $brand,
                'brand_err' => '',
                'deliveryDate_err' => '',
                'quantity_err' => ''
            ];

            // Load view
            $this->view('pharmacy/supplierOrders/submitOrder', $data);
        }
    }

    public function showAcceptedOrderBrandDetails($name)
    {
        // Fetch the inventory item by its ID
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);
        $orderItems = $this->pharmacyModel->getOrderItemsByName($name);

        $data = [
            'orderItem' => $orderItems,
            'pharmacyId' => $pharmacyId
        ];

        // Load view with inventory item data
        $this->view('pharmacy/supplierOrders/showAcceptedOrderBrandDetails', $data);
    }
    public function addReplyToRemarks($id)
    {
        $acceptedOrderDetails = $this->pharmacyModel->getAcceptedOrderById($id);

        $data = [
            'orderDetails' => $acceptedOrderDetails,
            'reply' => '',
            'reply_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'pharmacyId' => $_SESSION['USER_DATA']['id'],
                'orderDetails' => $acceptedOrderDetails,
                'reply' => trim($_POST['reply']),
                'reply_err' => ''
            ];

            // Validate
            if (empty($data['reply'])) {
                $data['reply_err'] = 'Please enter reply';
            }

            if (empty($data['reply_err'])) {
                // Call the model method to add the reply to the database
                if ($this->pharmacyModel->addReplyToRemarks($data)) {
                    redirect('pharmacies/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('pharmacy/supplierOrders/addReplyToRemarks', $data);
            }
        } else {
            $data = [
                'orderDetails' => $acceptedOrderDetails,
                'reply_err' => ''
            ];
            $this->view('pharmacy/supplierOrders/addReplyToRemarks', $data);
        }
    }

    public function rejectBid($id)
    {
        $acceptedOrderDetails = $this->pharmacyModel->getAcceptedOrderById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'pharmacyId' => $_SESSION['USER_DATA']['id'],
                'orderDetails' => $acceptedOrderDetails,
                'reason' => trim($_POST['reason']),
                'reason_err' => ''
            ];

            // Validate
            if (empty($data['reason'])) {
                $data['reason_err'] = 'Please enter reason';
            }

            if (empty($data['reason_err'])) {
                if ($this->pharmacyModel->rejectBid($data)) {
                    redirect('pharmacies/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('pharmacy/supplierOrders/rejectBid', $data);
            }
        } else {
            $data = [
                'orderDetails' => $acceptedOrderDetails
            ];
            $this->view('pharmacy/supplierOrders/rejectBid', $data);
        }
    }

    public function cancelOrder($id)
    {
        if ($this->pharmacyModel->cancelOrder($id)) {
            redirect('pharmacies/orders');
        } else {
            die('Something went wrong');
        }
    }


    public function receivedOrder($id)
{
    $getDeliveredOrderDetails = $this->pharmacyModel->getDeliveredOrderDetails($id);
    $receivedOrderDetails = $this->pharmacyModel->getReceivedOrderDetails($id);
    $getTotalQuantity = $this->pharmacyModel->getTotalReceivedquantity($id);

    $data = [
        'id' => $id,
        'orderDetails' => $receivedOrderDetails,
        'deliveredOrderDetails' => $getDeliveredOrderDetails,
        'totalQuantity' => $getTotalQuantity,
        'batchNo_err' => '',
        'unitPrice_err' =>  '',
        'description_err' =>  ''
    ];

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       
            // Add the data for this row to the $receivedOrderData array
            $data = [
                'id' => $id,
                'batchNo' => trim($_POST['batchNo']),
                'unitPrice' => trim($_POST['unitPrice']),
                'description' => trim($_POST['description']),
                'totalQuantity' => $getTotalQuantity,             
                'batchNo_err' => '',
                'unitPrice_err' => '',
                'description_err' => ''
            ];
        

        // Validate each row of data
       
            // Validate batch number
            if (empty($data['batchNo'])) {
                $data['batchNo_err'] = 'Please enter batch number';
            } elseif ($data['batchNo'] === 'BCH' || !preg_match('/^BCH[0-9]{6}$/', $data['batchNo'])) {
                $data['batchNo_err'] = 'Batch number should start with "BCH" followed by 6 digits';
            }

            // Validate unit price
            if (empty($data['unitPrice'])) {
                $data['unitPrice_err'] = 'Please enter unit price';
            }

            // Validate description
            if (empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            //check batchNo is exist
            if ($this->pharmacyModel->checkBatchNo($data)) {
                $data['batchNo_err'] = 'Batch number already exists';
            }

            // Check if there are any validation errors
            if (!empty($data['batchNo_err']) || !empty($data['unitPrice_err']) || !empty($data['description_err'])) {
                // If there are errors, assign the validated data back to the data array
                $data = [
                    'batchNo_err' => $data['batchNo_err'],
                    'unitPrice_err' =>  $data['unitPrice_err'],
                    'description_err' =>  $data['description_err'],
                    'orderDetails' => $receivedOrderDetails,
                    'totalQuantity' => $getTotalQuantity
                ];
                // Render the view with the errors
                $this->view('pharmacy/supplierOrders/receivedOrder', $data);
                return; // Exit the method
            }
     

        // If all rows pass validation, add received order inventory
        if ($this->pharmacyModel->addReceivedOrderInventory($data)) {
            $this->pharmacyModel->changeOrderStatus($id);
            redirect('pharmacies/orders');
        } else {
            die('Something went wrong');
        }
    } else {
        // If the request method is not POST, render the view with the data
        $this->view('pharmacy/supplierOrders/receivedOrder', $data);
    }

}




    // Controller Logic
    public function addReceivedOrderInventory($id)
    {
        $receivedOrderDetails = $this->pharmacyModel->getReceivedOrderDetails($id);

        $data = [
            'orderDetails' => $receivedOrderDetails,
            'batchNo_err' => '',
            'unitPrice_err' =>  '',
            'description_err' =>  ''
        ];

    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////History Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function history()
    {
        //sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $deliveredOrders = $this->pharmacyModel->getDeliveredOrders($pharmacyId);
        $supplierRejectedOrders = $this->pharmacyModel->getSupplierRejectedOrders($pharmacyId);
        $pharmacyRejectedOrders = $this->pharmacyModel->getPharmacyRejectedOrders($pharmacyId);
        $cancelledOrdersByPharmacy = $this->pharmacyModel->getCancelledOrders($pharmacyId);

        $data = [
            'deliveredOrders' => $deliveredOrders,
            'supplierRejectedOrders' => $supplierRejectedOrders,
            'pharmacyRejectedOrders' => $pharmacyRejectedOrders,
            'cancelledOrders' => $cancelledOrdersByPharmacy,
        ];

        $this->view('pharmacy/history/history', $data);
    }

    public function showDeliveredOrderMedicineBrandDetails($medicineName)
    {
        // Fetch the order by its ID
        $deliveredOrderMedicineBrandDetails = $this->pharmacyModel->getDeliveredOrderMedicineBrandDetails($medicineName);

        $data = [
            'orderDetails' => $deliveredOrderMedicineBrandDetails
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/deliveredOrderBrandDetails', $data);
    }

    public function showDeliveredOrderDetails($id)
    {
        // Fetch the order by its ID
        $deliveredOrderDetails = $this->pharmacyModel->getDeliveredOrderById($id);

        $data = [
            'orderDetails' => $deliveredOrderDetails
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/showDeliveredOrderDetails', $data);
    }

    public function showSupplierRejectedOrderMedicineBrandDetails($medicineName)
    {
        // Fetch the order by its ID
        $supplierRejectedOrderMedicineBrandDetails = $this->pharmacyModel->getSupplierRejectedOrderMedicineBrandDetails($medicineName);

        $data = [
            'orderDetails' => $supplierRejectedOrderMedicineBrandDetails
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/supplierRejectedOrderBrandDetails', $data);
    }

    public function showSupplierRejectedOrderDetails($id)
    {
        // Fetch the order by its ID
        $supplierRejectedOrderById = $this->pharmacyModel->getSupplierRejectedOrderById($id);

        $data = [
            'orderDetails' => $supplierRejectedOrderById
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/showSupplierRejectedOrderDetails', $data);
    }

    public function showPharmacyRejectedOrderMedicineBrandDetails($medicineName)
    {
        // Fetch the order by its ID
        $pharmacyRejectedOrderMedicineBrandDetails = $this->pharmacyModel->getPharmacyRejectedOrderMedicineBrandDetails($medicineName);

        $data = [
            'orderDetails' => $pharmacyRejectedOrderMedicineBrandDetails
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/pharmacyRejectedOrderBrandDetails', $data);
    }

    public function showPharmacyRejectedOrderDetails($id)
    {
        // Fetch the order by its ID
        $pharmacyRejectedOrderById = $this->pharmacyModel->getPharmacyRejectedOrderById($id);

        $data = [
            'orderDetails' => $pharmacyRejectedOrderById
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/showPharmacyRejectedOrderDetails', $data);
    }

    public function showCancelledOrderMedicineBrandDetails($medicineName)
    {
        // Fetch the order by its ID
        $cancelledOrderMedicineBrandDetails = $this->pharmacyModel->getCancelledOrderMedicineBrandDetails($medicineName);

        $data = [
            'orderDetails' => $cancelledOrderMedicineBrandDetails
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/cancelledOrderMedicineBrandDetails', $data);
    }

    public function showCancelledOrderDetails($id)
    {
        // Fetch the order by its ID
        $cancelledOrderById = $this->pharmacyModel->getCancelledOrderById($id);

        $data = [
            'orderDetails' => $cancelledOrderById
        ];

        // Load view with inventory item data
        $this->view('pharmacy/history/showCancelledOrderDetails', $data);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Profile Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function profile()
    {
        // Get the pharmacy ID from the session
        $id = $_SESSION['USER_DATA']['id'];
        // Fetch the profile data from the model
        $profile = $this->pharmacyModel->getProfile($id);

        // Pass the profile data to the view
        $data = [
            'profile' => $profile,
            'newPassword_err' => '',
            'confirmPassword_err' => '',
            'email_err' => '',
            'phone_err' => ''

        ];

        // Load the profile view and pass the data
        $this->view('pharmacy/profile/profile', $data);
    }

    public function changeContactNumber()
    {
        $id = $_SESSION['USER_DATA']['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->pharmacyModel->getProfile($id);

            // Get current contact number and new contact number 
            $data = [
                'profile' => $profile,
                'currentContactNumber' => trim($_POST['currentContactNumber']),
                'newContactNumber' => trim($_POST['newContactNumber']),
                'phone_err' => '',
            ];

            // Validate input fields
            if (empty($data['newContactNumber'])) {
                $data['phone_err'] = 'Please Enter New Contact Number';
            } elseif ($data['currentContactNumber'] == $data['newContactNumber']) {
                $data['phone_err'] = 'New contact number same as Current contact number';
            }

            if (empty($data['phone_err'])) {
                // Update the contact number in the database
                if ($this->pharmacyModel->updateContactNumber($data)) {
                
                    redirect('pharmacies/profile');
                } else {
                    http_response_code(400); // Bad Request
                    echo 'Failed to update contact number';
                }
            } else {
                // Return the error message to the popup
                http_response_code(400); // Bad Request
                echo $data['phone_err'];
            }
        }
    }


    public function changeEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get the necessary form data
            $currentEmail = trim($_POST['currentEmail']);
            $newEmail = trim($_POST['newEmail']);

            // Validate input fields
            $email_err = '';
            if (empty($newEmail)) {
                $email_err = 'Please Enter New Email Address';
            } elseif ($currentEmail == $newEmail) {
                $email_err = 'New email address same as Current email address';
            } elseif (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                $email_err = 'Please enter a valid email address';
            }

            if (empty($email_err)) {
                // Data is valid, proceed with updating email
                $updateData = [
                    'current_email' => $currentEmail,
                    'new_email' => $newEmail
                ];

                // Update email in both users and pharmacyregistration tables
                if ($this->pharmacyModel->updateEmail($updateData)) {
                    // Email updated successfully
                    redirect('pharmacies/profile');
                } else {
                    http_response_code(400); // Bad Request
                    echo 'Failed to update email address';
                }
            } else {
                // Return the error message to the popup
                http_response_code(400); // Bad Request
                echo $email_err;
            }
        }
    }

    public function changePassword()
    {
        $id = $_SESSION['USER_DATA']['id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->pharmacyModel->getProfile($id);

            // Initialize data array
            $data = [
                'profile' => $profile,
                'currentPassword' => trim($_POST['currentPassword']),
                'newPassword' => trim($_POST['newPassword']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'newPassword_err' => '',
                'confirmPassword_err' => '',
            ];

            // Validate input fields
            if (empty($data['newPassword'])) {
                $data['newPassword_err'] = 'Please Enter New Password';
            } elseif ($data['newPassword'] == $data['currentPassword']) {
                $data['newPassword_err'] = 'New password same as Current Password';
            } elseif (strlen($data['newPassword']) < 6 || strlen($data['newPassword']) > 30) {
                $data['newPassword_err'] = 'Password must be between 6 and 30 characters';
            }

            if (empty($data['confirmPassword'])) {
                $data['confirmPassword_err'] = 'Please Confirm Password';
            } elseif ($data['newPassword'] != $data['confirmPassword']) {
                $data['confirmPassword_err'] = 'Passwords Do Not Match';
            }

            if (empty($data['newPassword_err']) && empty($data['confirmPassword_err'])) {
                if ($this->pharmacyModel->updatePassword($data)) {
                    // Redirect to profile page
                    redirect('pharmacies/profile');
                } else {
                    http_response_code(400); // Bad Request
                    echo 'Failed to update password';
                }
            } else {
                // Return the error message to the popup
                http_response_code(400); // Bad Request
                echo json_encode(['newPassword_err' => $data['newPassword_err'], 'confirmPassword_err' => $data['confirmPassword_err']]);
            }
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Logout Function ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
}