<?php
class Suppliers extends Controller
{
    public $supplierModel;
    public function __construct()
    {
        $this->supplierModel = $this->model('Supplier');
    }
    public function index()
    {
        $data = [];
        $this->view('supplier/index', $data);
    }
    public function inventory()
    {
        $data = [];
        $this->view('supplier/inventory', $data);
    }
    public function addinventory()
    {
        $data = [];
        $this->view('supplier/addinventory', $data);
    }
    public function viewstock()
    {
        $data = [];
        $this->view('supplier/viewstock', $data);
    }
    public function messages()
    {
        $data = [];
        $this->view('supplier/messages', $data);
    }
    public function advertistments()
    {
        $data = [];
        $this->view('supplier/advertistments', $data);
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
            print_r($_POST);
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'medicineId' => trim($_POST['medicineId']),
                'pharmacyId' => trim($_POST['pharmacyId']),
                'pharmacyName' => trim($_POST['pharmacyName']),
                'type' => trim($_POST['type']),
                'volume' => trim($_POST['volume']),
                'brand' => trim($_POST['brand']),
                'category' => trim($_POST['category']),
                'bidAmount' => trim($_POST['bidAmount']),
                'deliveryDate' => trim($_POST['deliveryDate']),
                'supplierId' => trim($_SESSION['USER_DATA']['id']),
                'supplierName' => trim($_SESSION['USER_DATA']['name']),
                'bidAmount_err' => ''
            ];

            // Validate data
            if (empty($data['bidAmount'])) {
                $data['bidAmount_err'] = 'Please enter bid amount';
            }

            // Make sure no errors
            if (empty($data['bidAmount_err'])) {

                // Validated
                if ($this->supplierModel->acceptBid($data)) {
                    redirect('suppliers/orders');
                } else {
                    die('Something went wrong');
                }
            } else {

                $data= [
                    'request_order_details' => $this->supplierModel->getOrderById($id),
                    'orderDetails' => $orderDetails,
                    'medicineId' => trim($_POST['medicineId']),
                    'pharmacyId' => trim($_POST['pharmacyId']),
                    'pharmacyName' => trim($_POST['pharmacyName']),
                    'bidAmount' => trim($_POST['bidAmount']),
                    'deliveryDate' => trim($_POST['deliveryDate']),
                    'supplierId' => trim($_SESSION['USER_DATA']['id']),
                    'supplierName' => trim($_SESSION['USER_DATA']['name']),
                    'bidAmount_err' => ''

                ];
                // Load view
                $this->view('supplier/place_bid', $data);
            }
        }

        // Load view
        $this->view('supplier/place_bid', $data);
    }

    // public function acceptBid()
    // {
    //     // accept bid
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Sanitize POST array
    //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    //         $data = [
    //             'medicineId' => trim($_POST['medicineId']),
    //             'pharmacyId' => trim($_POST['pharmacyId']),
    //             'pharmacyName' => trim($_POST['pharmacyName']),
    //             'productCode' => trim($_POST['productCode']),
    //             'bidAmount' => trim($_POST['bidAmount']),
    //             'deliveryDate' => trim($_POST['deliveryDate']),
    //             'supplierId' => trim($_POST['supplierId']),
    //             'supplierName' => trim($_POST['supplierName']),

    //         ];
    //         // Validated
    //         if ($this->supplierModel->acceptBid($data)) {
    //             redirect('suppliers/orders');
    //         } else {
    //             die('Something went wrong');
    //         }
    //     }
    // }


    public function orders()
    {
        $order = $this->supplierModel->getOrder();
        $data = [
            'order' => $order
        ];
        $this->view('supplier/orders', $data);
    }
    public function history()
    {
        $data = [];
        $this->view('supplier/history', $data);
    }
    public function profile()
    {
        $data = [];
        $this->view('supplier/profile', $data);
    }
    public function logout()
    {
        unset($_SESSION['USER_DATA']);
        redirect('users/login');
    }
}
