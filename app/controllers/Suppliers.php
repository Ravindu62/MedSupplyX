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
                'orderId' => trim($_POST['orderId']),
                'medicineId' => trim($_POST['medicine_id']),
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

                $data = [
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
        $getAcceptBid = $this->supplierModel->getAcceptBid();
        $getApprovedBid = $this->supplierModel->getApprovedBid();

        $data = [
            'order' => $order,
            'getAcceptBid' => $getAcceptBid,
            'getApprovedBid' => $getApprovedBid
        ];
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
        $inventoryItem = $this->supplierModel->getInventoryItemMatchWithDeliverOrder($id);
        $approvedOrderDetails = $this->supplierModel->getApprovedOrderById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'OrderDetails' => $approvedOrderDetails,
                'inventoryItem' => $inventoryItem,
                'supplierId' => $_SESSION['USER_DATA']['id'],
                'supplierName' => $_SESSION['USER_DATA']['name'],
                'medicineName' => trim($_POST['medicineName']),
                'type' => trim($_POST['type']),
                'brand' => trim($_POST['brand']),
                'category' => trim($_POST['category']),
                'volume' => trim($_POST['volume']),
                'quantity' => trim($_POST['quantity']),
                'manufactureDate' => trim($_POST['manufactureDate']),
                'expiryDate' => trim($_POST['expiryDate']),
            ];

            if ($this->supplierModel->deliverOrder($data)) {
                redirect('suppliers/orders');
            } else {
                die('Something went wrong');
            }
        }
        //load the data to the view
        $data = [
            'orderDetails' => $approvedOrderDetails
        ];

        $this->view('supplier/deliverDetail', $data);
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
