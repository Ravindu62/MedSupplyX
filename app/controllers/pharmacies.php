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
        //sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data1 = trim($_SESSION['USER_DATA']['id']);

        $countTotalOrders = $this->pharmacyModel->countTotalOrders($data1);
        $countAcceptedOrders = $this->pharmacyModel->countAcceptedOrders($data1);
        $countPendingOrders = $this->pharmacyModel->countPendingOrders($data1);
        $countRejectedOrders = $this->pharmacyModel->countRejectedOrders($data1);
        $countOutOfStockProducts = $this->pharmacyModel->countOutOfStockProducts($data1);
        $countExpiredOrders = $this->pharmacyModel->countExpiredOrders($data1);

        $data = [
            'countTotalOrders' => $countTotalOrders,
            'countAcceptedOrders' => $countAcceptedOrders,
            'countPendingOrders' => $countPendingOrders,
            'countRejectedOrders' => $countRejectedOrders,
            'countOutOfStockProducts' => $countOutOfStockProducts,
            'countExpiredOrders' => $countExpiredOrders
        ];


        $this->view('pharmacy/dashboard/index', $data);
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

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Initialize data
            $data = [
                'medicineId' => trim($_POST['medicineId']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNo' => trim($_POST['batchNo']),
                'category' => trim($_POST['category']),
                'quantity' => trim($_POST['quantity']),
                'manufacturedDate' => trim($_POST['manufacturedDate']),
                'expireDate' => trim($_POST['expireDate']),
                'unitPrice' => trim($_POST['unitPrice']),
                'medicineId_err' => '',
                'medicineName_err' => '',
                'batchNo_err' => '',
                'category_err' => '',
                'quantity_err' => '',
                'manufacturedDate_err' => '',
                'expireDate_err' => '',
                'unitPrice_err' => '',
            ];

            // Validate data
            if (empty($data['medicineId'])) {
                $data['medicineId_err'] = 'Please enter medicine id';
            }

            if (empty($data['medicineName'])) {
                $data['medicineName'] = 'Please enter medicine name';
            }

            if (empty($data['batchNo'])) {
                $data['batchNo_err'] = 'Please enter batch number';
            }

            if (empty($data['category'])) {
                $data['category_err'] = 'Please enter category of th    e medicine';
            }

            if (empty($data['manufacturedDate'])) {
                $data['manufacturedDate_err'] = 'Please enter manufacture date medicine';
            }

            if (empty($data['expireDate'])) {
                $data['expireDate_err'] = 'Please enter expire date of the medicine';
            }

            if (empty($data['unitPrice'])) {
                $data['unitPrice_err'] = 'Please enter the unit price of this medicine';
            }
            // Make sure no errors
            if (empty($data['medicineId_err']) && empty($data['medicineName_err']) && empty($data['batchNo_err']) && empty($data['category_err']) && empty($data['quantity_err']) && empty($data['manufacturedDate_err']) && empty($data['expireDate_err']) && empty($data['unitPrice_err'])) {
                // Validated

                // Inventory model function
                if ($this->pharmacyModel->addInventory($data)) {
                    // Redirect to order
                    $this->view('pharmacy/inventory/addInventory', $data);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/inventory/addInventory', $data);
            }
    }
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Messages Function /////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messages()
    {
        $data = [];

        $this->view('pharmacy/notifications/messages', $data);
    }


    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Advertisement Function/////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function advertistments()
    {
        $data = [];

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


    public function addOrder()
    {


        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'Mname' => trim($_POST['Mname']),
                'Bnum' => trim($_POST['Bnum']),
                'quantity' => trim($_POST['quantity']),
                'ddate' => trim($_POST['ddate']),
                'oedate' => trim($_POST['oedate']),
                'username' => $_SESSION['USER_DATA']['name'],
                'Mname_err' => '',
                'Bnum_err' => '',
                'quantity_err' => '',
                'ddate_err' => '',
                'oedate_err' => ''
            ];

            // Validate data
            if (empty($data['Mname'])) {
                $data['Mname_err'] = 'Please enter medicine name';
            }

            if (empty($data['Bnum'])) {
                $data['Bnum_err'] = 'Please enter batch number';
            }

            if (empty($data['quantity'])) {
                $data['quantity_err'] = 'Please enter quantity';
            }

            if (empty($data['ddate'])) {
                $data['ddate_err'] = 'Please enter delivery date';
            }

            if (empty($data['oedate'])) {
                $data['oedent_err'] = 'Please enter order entry date';
            }

            // Make sure no errors
            if (empty($data['Mname_err']) && empty($data['Bnum_err']) && empty($data['quantity_err']) && empty($data['ddate_err']) && empty($data['oedent_err'])) {
                // Validated

                // Check and set logged in user
                if (isset($_SESSION['user_id'])) {
                    $data['user_id'] = $_SESSION['user_id'];
                } else {
                    $data['user_id'] = 0;
                }

                // Register user from model function
                if ($this->pharmacyModel->addOrder($data)) {
                    // Redirect to order
                    redirect('pharmacies/supplierOrders/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/supplierOrders/addorder', $data);
            }
        } else {
            // Init data
            $data = [
                'Mname' => '',
                'Bnum' => '',
                'quantity' => '',
                'ddate' => '',
                'oedate' => '',
                'username' => '',
                'Mname_err' => '',
                'Bnum_err' => '',
                'quantity_err' => '',
                'ddate_err' => '',
                'oedate_err' => ''
            ];

            // Load view
            $this->view('pharmacy/supplierOrders/addorder', $data);
        }
    }


    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Customer Order Function ////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function customerOrders()
    {
        $data = [];

        $this->view('pharmacy/customerOrders/customerOrders', $data);
    }

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
    // Sanitize user inputs
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form submission
        $updateResult = $this->updateProfile();
        if ($updateResult) {
            // Profile updated successfully, reload the page
            redirect('pharmacy/profile');
        } else {
            // Error updating profile, handle accordingly
            // For example, set an error message and reload the page
            $data = [
                'error' => 'Failed to update profile.'
            ];
            $this->view('pharmacy/profile/profile', $data);
        }
    } else {
        // Load profile data
        $pharmacyName = trim($_SESSION['USER_DATA']['name']);
        $profile = $this->pharmacyModel->getProfileData($pharmacyName);
        $data = [
            'profile' => $profile
        ];
        $this->view('pharmacy/profile/profile', $data);
    }
}

    // public function profile()
    // {
    //     // sanitize user inputs
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //     $pharmacyName = trim($_SESSION['USER_DATA']['name']);

    //     $profile = $this->pharmacyModel->getProfileData($pharmacyName);

    //     $data = [
    //         'profile' => $profile
    //     ];

    //     $this->view('pharmacy/profile/profile', $data);
    // }

    
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