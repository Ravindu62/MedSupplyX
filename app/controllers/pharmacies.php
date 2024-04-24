<?php
class Pharmacies extends Controller
{

    public $pharmacyModel;
    private $db;

    public function __construct()
    {
        $this->pharmacyModel = $this->model('pharmacy');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Dashboard Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get the pharmacy ID from the session
        $pharmacyId = $_SESSION['USER_DATA']['id'];

        // Get the current date in the format "YYYY-MM-DD"
        $currentDate = date("Y-m-d");

        // Call the model methods to count various statistics
        $countTotalOrders = $this->pharmacyModel->countTotalOrders($pharmacyId);
        $countAcceptedOrders = $this->pharmacyModel->countAcceptedOrders($pharmacyId);
        $countPendingOrders = $this->pharmacyModel->countPendingOrders($pharmacyId);
        $countRejectedOrders = $this->pharmacyModel->countRejectedOrders($pharmacyId);
        $countOutOfStockProducts = $this->pharmacyModel->countOutOfStockProducts($pharmacyId);
        $countCancelledOrders = $this->pharmacyModel->countCancelledOrders($pharmacyId);
        $countTodaysCustomerOrders = $this->pharmacyModel->countTodaysCustomerOrders($pharmacyId, $currentDate);
        $countBills = $this->pharmacyModel->countBills($pharmacyId);

        // Prepare the data to pass to the view
        $data = [
            'countTotalOrders' => $countTotalOrders,
            'countAcceptedOrders' => $countAcceptedOrders,
            'countPendingOrders' => $countPendingOrders,
            'countRejectedOrders' => $countRejectedOrders,
            'countOutOfStockProducts' => $countOutOfStockProducts,
            'countCancelledOrders' => $countCancelledOrders,
            'countTodaysCustomerOrders' => $countTodaysCustomerOrders,
            'countBills' => $countBills,
        ];

        // Load the view with the data
        $this->view('pharmacy/dashboard/index', $data);
    }


    public function ongoingOrders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $ongoingOrders = $this->pharmacyModel->getOrders();

        $data = [
            'ongoingOrders' => $ongoingOrders
        ];

        $this->view('pharmacy/dashboard/ongoingOrders', $data);
    }

    public function acceptedOrders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $acceptedOrders = $this->pharmacyModel->acceptedOrders();

        $data = [
            'acceptedOrders' => $acceptedOrders
        ];

        $this->view('pharmacy/dashboard/acceptedOrders', $data);
    }

    public function pendingOrders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $pendingOrders = $this->pharmacyModel->pendingOrders();

        $data = [
            'pendingOrders' => $pendingOrders
        ];

        $this->view('pharmacy/dashboard/pendingOrders', $data);
    }

    public function rejectedOrders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $rejectedOrders = $this->pharmacyModel->rejectedOrders();

        $data = [
            'rejectedOrders' => $rejectedOrders
        ];

        $this->view('pharmacy/dashboard/rejectedOrders', $data);
    }

    public function cancelledOrders()
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $cancelledOrders = $this->pharmacyModel->getCancelledOrdersByPharmacy($pharmacyId);

        $data = [
            'cancelledOrders' => $cancelledOrders
        ];

        $this->view('pharmacy/dashboard/cancelledOrders', $data);
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
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        // Get inventory items for the pharmacy
        $inventory_items = $this->pharmacyModel->getInventoryItems($pharmacyId);

        $data = [
            'inventory' => $inventory_items,
        ];

        $this->view('pharmacy/inventory/inventory', $data);
    }

    public function addInventory()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            print_r($_POST);

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
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

                // Inventory model function
                if ($this->pharmacyModel->addInventory($data)) {
                    // Redirect to order
                    redirect('pharmacies/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/inventory/addInventory', $data);
            }
        } else {
            // Init data
            $data = [
                'refno' => '',
                'medicineName' => '',
                'batchNo' => '',
                'category' => '',
                'volume' => '',
                'type' => '',
                'brand' => '',
                'quantity' => '',
                'unitPrice' => '',
                'manufacturedDate' => '',
                'expireDate' => '',
                'description' => '',
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
        }
        // Load view
        $this->view('pharmacy/inventory/addInventory', $data);
    }

    public function showInventoryDetails($id)
    {
        // Fetch the inventory item by its ID
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);
        $inventory_item = $this->pharmacyModel->getInventoryItemById($id, $pharmacyId);

        $data = [
            'inventory_item' => $inventory_item
        ];

        // Load view with inventory item data
        $this->view('pharmacy/inventory/showInventoryDetails', $data);
    }

    // public function editInventory() according to the addInventory function
    public function editInventory()
    {
        print_r($_POST);
        // Fetch the inventory item by its ID
        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $inventoryId = trim($_POST['id']);
        $inventory_item = $this->pharmacyModel->getInventoryItemById($inventoryId, $pharmacyId);

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

    public function removeInventory()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get the inventory item ID from the form
            $inventoryId = trim($_POST['id']);

            // Call the model function to delete the inventory item
            if ($this->pharmacyModel->removeInventory($inventoryId)) {
                // Redirect to inventory page after successful deletion
                redirect('pharmacies/inventory');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('pharmacies/inventory');
        }
    }

    // public function editInventory()
    // {
    //     $inventoryId = $_GET['id'];
    //     // Fetch the inventory item by its ID
    //     $inventory_item = $this->pharmacyModel->getInventoryItemById($inventoryId);

    //     // Check if the form is submitted
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Process form data

    //         // Sanitize POST data
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         // Initialize data array
    //         $data = [
    //             'id' => $_GET['id'], // Inventory item ID
    //             'medicineId' => trim($_POST['medicineId']),
    //             'medicineName' => trim($_POST['medicineName']),
    //             'batchNo' => trim($_POST['batchNo']),
    //             'category' => trim($_POST['category']),
    //             'quantity' => trim($_POST['quantity']),
    //             'manufacturedDate' => trim($_POST['manufacturedDate']),
    //             'expireDate' => trim($_POST['expireDate']),
    //             'unitPrice' => trim($_POST['unitPrice']),
    //             'medicineId_err' => '',
    //             'medicineName_err' => '',
    //             'batchNo_err' => '',
    //             'category_err' => '',
    //             'quantity_err' => '',
    //             'manufacturedDate_err' => '',
    //             'expireDate_err' => '',
    //             'unitPrice_err' => '',
    //         ];

    //         // Validate data
    //         if (empty($data['medicineId'])) {
    //             $data['medicineId_err'] = 'Please enter medicine id';
    //         }

    //         if (empty($data['medicineName'])) {
    //             $data['medicineName'] = 'Please enter medicine name';
    //         }

    //         if (empty($data['batchNo'])) {
    //             $data['batchNo_err'] = 'Please enter batch number';
    //         }

    //         if (empty($data['category'])) {
    //             $data['category_err'] = 'Please enter category of the medicine';
    //         }

    //         if (empty($data['manufacturedDate'])) {
    //             $data['manufacturedDate_err'] = 'Please enter manufacture date medicine';
    //         }

    //         if (empty($data['expireDate'])) {
    //             $data['expireDate_err'] = 'Please enter expire date of the medicine';
    //         }

    //         if (empty($data['unitPrice'])) {
    //             $data['unitPrice_err'] = 'Please enter the unit price of this medicine';
    //         }

    //         // Call the model function to update inventory item
    //         if ($this->pharmacyModel->editInventory($data)) {
    //             // Redirect to inventory page after successful update
    //             redirect('pharmacies/inventory');
    //         } else {
    //             die('Something went wrong');
    //         }
    //     } else {
    //         // Load view with inventory item data for editing
    //         $this->view('pharmacy/inventory/editInventory', $inventory_item);
    //     }
    // }


    // public function removeInventory()
    // {
    //     // Check for POST
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Process form

    //         // Sanitize POST data
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //         // Get the inventory item ID from the form
    //         $inventoryId = trim($_POST['id']);

    //         // Call the model function to delete the inventory item
    //         if ($this->pharmacyModel->removeInventory($inventoryId)) {
    //             // Redirect to inventory page after successful deletion
    //             redirect('pharmacies/inventory');
    //         } else {
    //             die('Something went wrong');
    //         }
    //     } else {
    //         redirect('pharmacies/inventory');
    //     }
    // }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Messages Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messages()
    {
        //Sanitize inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $messages = $this->pharmacyModel->getMessages($pharmacyId);

        $data = [
            'messages' => $messages
        ];

        $this->view('pharmacy/notifications/messages', $data);
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
            'status' => trim($_POST['status'])

        ];

        if ($this->pharmacyModel->changeStatus($data)) {
            redirect('pharmacies/orders');
        } else {
            die('Something went wrong');
        }
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
                'id' => trim($_POST['id']),
                'brand' => $brand,
                'medicine' => $medicine,
                'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
                'pharmacyName' => trim($_SESSION['USER_DATA']['name']),
                'medicineId' => trim($_POST['medicineId']),
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
                'refNo_err' => '',
                'category_err' => '',
                'volume_err' => '',
                'type_err' => '',
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
            $this->view('pharmacy/supplierOrders/changeOrderDetails', $order);
        }
    }

    public function addOrder()
    {
        //display medicine detail
        $medicine = $this->pharmacyModel->getRegisteredMedicines();

        $data = [
            'medicine' => $medicine
        ];

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


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Customer Order Function ////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function customerDetails()
    {
        //get data from form and passed to the model
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'pharmacyId' => trim($_SESSION['USER_DATA']['id']),
                'pharmacyName' => trim($_SESSION['USER_DATA']['name']),
                'customerName' => trim($_POST['customerName']),
                'customerPhone' => trim($_POST['customerPhone']),
                'customerEmail' => trim($_POST['customerEmail']),
                'customerAddress' => trim($_POST['customerAddress']),
                'customerName_err' => '',
                'customerPhone_err' => '',
                'customerEmail_err' => '',
                'customerAddress_err' => ''
            ];

            // Validate data
            if (empty($data['customerName'])) {
                $data['customerName_err'] = 'Please enter customer name';
            }

            if (empty($data['customerPhone'])) {
                $data['customerPhone_err'] = 'Please enter customer phone number';
            }

            if (empty($data['customerEmail'])) {
                $data['customerEmail_err'] = 'Please enter customer email';
            }

            if (empty($data['customerAddress'])) {
                $data['customerAddress_err'] = 'Please enter customer address';
            }

            // Make sure no errors
            if (empty($data['customerName_err']) && empty($data['customerPhone_err']) && empty($data['customerEmail_err']) && empty($data['customerAddress_err'])) {
                // Validated
                // Inventory model function
                if ($this->pharmacyModel->customerDetails($data)) {
                    // Redirect to order
                    redirect('pharmacies/customerOrders');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/customerOrders/customerDetails', $data);
            }
        } else {
            // Init data
            $data = [
                'customerName' => '',
                'customerPhone' => '',
                'customerEmail' => '',
                'customerAddress' => '',
                'customerName_err' => '',
                'customerPhone_err' => '',
                'customerEmail_err' => '',
                'customerAddress_err' => ''
            ];

            // Load view
            $this->view('pharmacy/customerOrders/customerDetails', $data);
        }
    }
    //add customerOrder function to add the customer order to the database with the customer details.
    public function customerOrders($id)
    {
        // Fetch the order by its ID
        // $customer = $this->pharmacyModel->getCustomerById($id);
        $order = $this->pharmacyModel->getCustomerById($id);

        $this->view('pharmacy/customerOrders/customerOrders', $order);
    }


    // public function fetchCustomerDetails()
    // {
    //     // Assuming you have a model method to fetch customer details by name
    //     $customerName = $_POST['customerName'];
    //     $customerDetails = $this->pharmacyModel->fetchCustomerDetailsByName($customerName);

    //     // Send the customer details as JSON response
    //     echo json_encode($customerDetails);
    // }

    // //create a function to get the customer details from the customer table 
    // public function customerOrders( ){

    // }

    //

    public function deleteOrder($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $order = $this->pharmacyModel->getOrderById($id);

            // Check for owner
            if ($order->pharmacyname != $_SESSION['USER_DATA']['name']) {
                redirect('pharmacies/supplierOrders/orders');
            }

            if ($this->pharmacyModel->deleteOrder($id)) {
                redirect('pharmacies/supplierOrders/orders');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('pharmacies/supplierOrders/orders');
        }
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
        $cancelledOrdersByPharmacy = $this->pharmacyModel->getCancelledOrdersByPharmacy($pharmacyId);
        $rejectedOrdersBySuppliers = $this->pharmacyModel->getRejectedOrdersBySuppliers($pharmacyId);
        $rejectedOrdersByPharmacy = $this->pharmacyModel->getRejectedOrdersByPharmacy($pharmacyId);

        $data = [
            'deliveredOrders' => $deliveredOrders,
            'cancelledOrdersByPharmacy' => $cancelledOrdersByPharmacy,
            'rejectedOrdersBySuppliers' => $rejectedOrdersBySuppliers,
            'rejectedOrdersByPharmacy' => $rejectedOrdersByPharmacy,
        ];

        $this->view('pharmacy/history/history', $data);
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Profile Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function profile()
    {
        // sanitize user inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $profile = $this->pharmacyModel->getProfileData($pharmacyId);

        $data = [
            'profile' => $profile
        ];

        $this->view('pharmacy/profile/profile', $data);
    }

    // Controller Function
    public function changeContactNumber()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'phone' => trim($_POST['newPhone']),
                'email' => trim($_POST['email']),
                'phone_err' => ''
            ];

            // Validate data
            if (empty($data['phone'])) {
                $data['phone_err'] = 'Please enter the new contact number';
            }

            // Make sure no errors
            if (empty($data['phone_err'])) {
                // Validated

                // Register user from model function
                if ($this->pharmacyModel->changeContactNumber($data)) {
                    // Fetch updated profile data
                    $profile = $this->pharmacyModel->getUpdateProfileData($data['email']);

                    // Pass the updated profile data to the view
                    $data['profile'] = $profile;

                    // Redirect to profile with updated data
                    $this->view('pharmacy/profile/profile', $data);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/profile/profile', $data);
            }
        } else {
            // Init data
            $data = [
                'phone' => '',
                'phone_err' => ''
            ];

            // Load view
            $this->view('pharmacy/profile/profile', $data);
        }
    }

    public function changeEmail()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'newEmail' => trim($_POST['newEmail']),
                'email' => trim($_POST['email']),
                'email_err' => ''
            ];

            // Validate data
            if (empty($data['newEmail'])) {
                $data['email_err'] = 'Please enter the new email address';
            }

            // Make sure no errors
            if (empty($data['email_err'])) {
                // Validated

                // Register user from model function
                if ($this->pharmacyModel->changeEmail($data)) {
                    // Fetch updated profile data
                    $profile = $this->pharmacyModel->getUpdateProfileData($data['newEmail']);

                    // Pass the updated profile data to the view
                    $data['profile'] = $profile;

                    // Redirect to profile with updated data
                    $this->view('pharmacy/profile/profile', $data);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/profile/profile', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'email_err' => ''
            ];

            // Load view
            $this->view('pharmacy/profile/profile', $data);
        }
    }

    public function changePassword()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'email' => trim($_POST['email']),
                'newPassword' => trim($_POST['newPassword']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'newPassword_err' => '',
                'confirmPassword_err' => ''
            ];

            // Validate data
            if (empty($data['currentPassword'])) {
                $data['currentPassword_err'] = 'Please enter the current password';
            }

            if (empty($data['newPassword'])) {
                $data['newPassword_err'] = 'Please enter the new password';
            }

            if (empty($data['confirmPassword'])) {
                $data['confirmPassword_err'] = 'Please confirm the new password';
            }

            if ($data['newPassword'] != $data['confirmPassword']) {
                $data['confirmPassword_err'] = 'Passwords do not match';
            }

            // Make sure no errors
            if (empty($data['currentPassword_err']) && empty($data['newPassword_err']) && empty($data['confirmPassword_err'])) {
                // Validated

                // Register user from model function
                if ($this->pharmacyModel->changePassword($data)) {
                    // Fetch updated profile data
                    $profile = $this->pharmacyModel->getUpdateProfileData($data['email']);

                    // Pass the updated profile data to the view
                    $data['profile'] = $profile;

                    // Redirect to profile with updated data
                    $this->view('pharmacy/profile/profile', $data);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/profile/profile', $data);
            }
        } else {
            // Init data
            $data = [
                'currentPassword' => '',
                'newPassword' => '',
                'confirmNewPassword' => '',
                'currentPassword_err' => '',
                'newPassword_err' => '',
                'confirmNewPassword_err' => ''
            ];

            // Load view
            $this->view('pharmacy/profile/profile', $data);
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
