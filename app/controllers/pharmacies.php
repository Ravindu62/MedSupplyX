<?php
class Pharmacies extends Controller
{

    public $pharmacyModel;
    private $db;

    public function __construct()
    {
        $this->pharmacyModel = $this->model('Pharmacy');
    }

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


        $this->view('pharmacy/index', $data);
    }


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

        $this->view('pharmacy/inventory', $data);
    }


    public function messages()
    {
        $data = [];

        $this->view('pharmacy/messages', $data);
    }

    public function advertistments()
    {
        $data = [];

        $this->view('pharmacy/advertistments', $data);
    }

    public function orders()
    {

        $data1 = [
            'pharmacyname' => trim($_SESSION['USER_DATA']['name'])
        ];

        $this->pharmacyModel->getOrder($data1);
        $order = $this->pharmacyModel->getOrder();

        $data = [
            'order' => $order,

        ];

        $this->view('pharmacy/orders', $data);
    }

    public function customerOrders()
    {
        $data = [];

        $this->view('pharmacy/customerOrders', $data);
    }

    public function deleteOrder($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $order = $this->pharmacyModel->getOrderById($id);

            // Check for owner
            if ($order->pharmacyname != $_SESSION['USER_DATA']['name']) {
                redirect('pharmacies/orders');
            }

            if ($this->pharmacyModel->deleteOrder($id)) {
                redirect('pharmacies/orders');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('pharmacies/orders');
        }
    }


    public function history()
    {
        //sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyId = trim($_SESSION['USER_DATA']['id']);

        $deliveredHistory = $this->pharmacyModel->getDeliverdOrders($pharmacyId);
        $canceledHistory = $this->pharmacyModel->getCanceledOrders($pharmacyId);

        $data = [
            'deliveredHistory' => $deliveredHistory,
            'canceledHistory' => $canceledHistory
        ];
        
        $this->view('pharmacy/history/history', $data);
    }

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

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function new_order()
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
                    redirect('pharmacies/orders');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/new_order', $data);
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
            $this->view('pharmacy/new_order', $data);
        }
    }


    public function new_inventory()
    {


        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'medicineId' => trim($_POST['medicineId']),
                'medicineName' => trim($_POST['medicineName']),
                'batchNum' => trim($_POST['batchnum']),
                'catergory' => trim($_POST['catergory']),
                'quantity' => trim($_POST['quantity']),
                'manu_date' => trim($_POST['manu_date']),
                'expire_date' => trim($_POST['expire_date']),
                'unit_price' => trim($_POST['unit_price']),
                'medicineId_err' => '',
                'medicineName_err' => '',
                'batchNum_err' => '',
                'catergory_err' => '',
                'quantity_err' => '',
                'manu_date_err' => '',
                'expire_date_err' => '',
                'unit_price_err' => '',
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
                    redirect('pharmacies/inventory');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('pharmacy/new_inventory', $data);
            }
        } else {
            // Init data
            $data = [
                'medicineId' => '',
                'medicineName' => '',
                'batchNum' => '',
                'catergory' => '',
                'quantity' => '',
                'manu_date' => '',
                'expire_date' => '',
                'unit_price' => '',
                'medicineId_err' => '',
                'medicineName_err' => '',
                'batchNum_err' => '',
                'catergory_err' => '',
                'quantity_err' => '',
                'manu_date_err' => '',
                'expire_date_err' => '',
                'unit_price_err' => '',
            ];

            // Load view
            $this->view('pharmacy/new_inventory', $data);
        }
    }
}
