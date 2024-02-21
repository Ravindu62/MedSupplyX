<?php
 class Suppliers extends Controller {

    public $supplierModel;
    public function __construct() {
        $this->supplierModel = $this->model('Supplier');
    }
    public function index() {
        $data = [];
        
        $this->view('supplier/index', $data);

    }

    public function inventory() {
        $data = [];
        
        $this->view('supplier/inventory', $data);

    }

    public function messages() {
        $data = [];
        
        $this->view('supplier/messages', $data);

    }

    public function advertistments() {
        $data = [];
        
        $this->view('supplier/advertistments', $data);

    }

    public function orders() {

        // approve order
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            $data = [
                'price' => trim($_POST['price'])
            ];
    
            // Validated
            if($this->supplierModel->approveOrder($data)) {
                redirect('suppliers/orders');
            } else {
                die('Something went wrong');
            }
        }

        $order = $this->supplierModel->getOrder();

        $data = [
            'order' => $order
        ];
        
        $this->view('supplier/orders', $data);

    }

    public function history() {
        $data = [];
        
        $this->view('supplier/history', $data);

    }

    public function profile() {
        $data = [];
        
        $this->view('supplier/profile', $data);

    }

    public function logout() {
        unset($_SESSION['USER_DATA']);
        redirect('users/login');
     }

 }