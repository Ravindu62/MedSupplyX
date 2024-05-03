<?php
class Admins extends Controller
{

    public $adminModel;
    public $userModel;
    public $db;


    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
        if (!Auth::is_admin()) {
            redirect('users/login');
        }          
       
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Dashboard/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        // Count different entities for dashboard
        $countPharmacies = $this->adminModel->countPharmacies();
        $countapprovedPharmacy = $this->adminModel->countapprovedPharmacies();
        $countpendingPharmacy = $this->adminModel->countpendingPharmacies();
        $countrejectedPharmacy = $this->adminModel->countrejectedPharmacies();
        $countSuppliers = $this->adminModel->countSuppliers();
        $countapprovedSuppliers = $this->adminModel->countapprovedSuppliers();
        $countpendingSuppliers = $this->adminModel->countpendingSuppliers();
        $countrejectedSuppliers = $this->adminModel->countrejectedSuppliers();
        $countManagers = $this->adminModel->countManagers();
        $countOrders = $this->adminModel->countOrders();
        $countMedicines = $this->adminModel->countMedicines();
        $countMessages = $this->adminModel->countMessages();

        // Prepare data for the view
        $data = [
            'countPharmacies' => $countPharmacies,
            'countapprovedPharmacies' => $countapprovedPharmacy,
            'countpendingPharmacies' => $countpendingPharmacy,
            'countrejectedPharmacies' => $countrejectedPharmacy,
            'countSuppliers' => $countSuppliers,
            'countapprovedSuppliers' => $countapprovedSuppliers,
            'countpendingSuppliers' => $countpendingSuppliers,
            'countrejectedSuppliers' => $countrejectedSuppliers,
            'countManagers' => $countManagers,
            'countOrders' => $countOrders,
            'countMedicines' => $countMedicines,
            'countMessages' => $countMessages
        ];

        // Load the dashboard view with the data
        $this->view('admin/dashboard/index', $data);
    }

    public function approvedPharmacy()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get approved pharmacies from the model
        $approvedPharmacy = $this->adminModel->approvedPharmacy();

        $data = [
            'approvedPharmacy' => $approvedPharmacy
        ];
        // Load view with the data
        $this->view('admin/dashboard/approvedPharmacy', $data);
    }

    public function pendingPharmacy()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get pending pharmacies from the model
        $pendingPharmacy = $this->adminModel->pendingPharmacy();

        $data = [
            'pendingPharmacy' => $pendingPharmacy
        ];
        // Load view with the data
        $this->view('admin/dashboard/pendingPharmacy', $data);
    }

    public function rejectedPharmacy()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get rejected pharmacies from the model
        $rejectedPharmacy = $this->adminModel->rejectedPharmacy();

        $data = [
            'rejectedPharmacy' => $rejectedPharmacy
        ];
        // Load view with the data
        $this->view('admin/dashboard/rejectedPharmacy', $data);
    }

    public function approvedSupplier()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get approved suppliers from the model
        $approvedSupplier = $this->adminModel->approvedSupplier();

        $data = [
            'approvedSupplier' => $approvedSupplier
        ];
        // Load view with the data
        $this->view('admin/dashboard/approvedSupplier', $data);
    }

    public function pendingSupplier()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get pending suppliers from the model
        $pendingSupplier = $this->adminModel->pendingSupplier();

        $data = [
            'pendingSupplier' => $pendingSupplier
        ];
        // Load view with the data
        $this->view('admin/dashboard/pendingSupplier', $data);
    }

    public function rejectedSupplier()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get rejected suppliers from the model
        $rejectedSupplier = $this->adminModel->rejectedSupplier();

        $data = [
            'rejectedSupplier' => $rejectedSupplier
        ];
        // Load view with the data
        $this->view('admin/dashboard/rejectedSupplier', $data);
    }

    public function medicines()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get medicines from the model
        $medicines = $this->adminModel->medicines();

        $data = [
            'medicines' => $medicines
        ];
        // Load view with the data
        $this->view('admin/dashboard/medicines', $data);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Manager Registration/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function managerRegistration()
    {

        // Register manager
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'mname' => trim($_POST['mname']),
                'memail' => trim($_POST['memail']),
                'mpassword' => trim($_POST['mpassword']),
                'confirm_password' => trim($_POST['confirm_password']),
                'mphone' => trim($_POST['mphone']),
                'maddress' => trim($_POST['maddress']),
                'mname_err' => '',
                'memail_err' => '',
                'mpassword_err' => '',
                'confirm_password_err' => '',
                'mphone_err' => '',
                'maddress_err' => ''
                
            ];

            // Validated data
            if (empty($data['mname'])) {
                $data['mname_err'] = 'Please enter name';
            }

            if (empty($data['memail'])) {
                $data['memail_err'] = 'Please enter email';
            } else {
                // Check email
                if ($this->adminModel->findManagerByEmail($data['memail'])) {
                    $data['memail_err'] = 'Email is already taken';
                }
            }


            if (empty($data['mpassword'])) {
                $data['mpassword_err'] = 'Please enter password';
            } elseif (strlen($data['mpassword']) < 6) {
                $data['mpassword_err'] = 'Password must be at least 6 characters';
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if ($data['mpassword'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }

            // check password should be 123456
            if ($data['mpassword'] != '123456') {
                $data['mpassword_err'] = 'You are not used default password';
            }


            if (empty($data['mphone'])) {
                $data['mphone_err'] = 'Please enter phone number';
            }

            if (empty($data['maddress'])) {
                $data['maddress_err'] = 'Please enter address';
            }

            // Make sure errors are empty
            if (empty($data['mname_err']) && empty($data['memail_err']) && empty($data['mpassword_err']) && empty($data['confirm_password_err']) && empty($data['mphone_err']) && empty($data['maddress_err'])) {
                // Validated
                // Hash Password
                //  $data['mpassword'] = password_hash($data['mpassword'], PASSWORD_DEFAULT);
                // Register Manager
                if ($this->adminModel->regManager($data)) {
                    $this->view('popup/registered');
                    // send email to manager
                    $name = $data['mname'];
                    $email = $data['memail'];
                    $mail = new Mail();
                    $mail->sendConfirmationEmailToManager($email, $name);
                    redirect('admins/managers');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/managerRegistration', $data);
            }
        } else {
            // Init data
            $data = [
                'mname' => '',
                'memail' => '',
                'mpassword' => '',
                'confirm_password' => '',
                'mphone' => '',
                'maddress' => '',
                'mname_err' => '',
                'memail_err' => '',
                'mpassword_err' => '',
                'confirm_password_err' => '',
                'mphone_err' => '',
                'maddress_err' => ''
            ];

            // Load view
            $this->view('admin/managerRegistration', $data);
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Managers/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function managers()
    {
        // Retrieve managers
        $manager = $this->adminModel->getManager();

        $data = [
            'managers' => $manager
        ];
        // Load the view
        $this->view('admin/managers', $data);
    }


    public function deleteManager($id)
    {
        if ($this->adminModel->deleteManager($id)) {
            //Manager deleted successfully
            redirect('admins/managers');
        } else {
            //Manager deletion failed
            die('Something went wrong');
        }
    }


    public function updateManager($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the manager's current data from the database
            $manager = $this->adminModel->getManagerById($id);

            // Assign the new data from the POST request to variables
            $name = !empty($_POST['newName']) ? trim($_POST['newName']) : $manager->name;
            $address = !empty($_POST['newAddress']) ? trim($_POST['newAddress']) : $manager->address;
            $phone = !empty($_POST['newPhone']) ? trim($_POST['newPhone']) : $manager->phone;

            // Check if at least one field is filled out
            if (empty($_POST['newName']) && empty($_POST['newAddress']) && empty($_POST['newPhone'])) {
                // Display an error message or handle the case where none of the fields are filled out
                http_response_code(400); // Bad Request
                echo 'At least one field must be filled';
                exit;
            }

            // Check if the updated data is different from the current data
            if ($name === $manager->name && $address === $manager->address && $phone === $manager->phone) {
                // Display an error message or handle the case where the updated data is the same as the current data
                http_response_code(400); // Bad Request
                echo 'Updated data is same as current data';
                exit;
            }

            // Update the manager in the database
            if ($this->adminModel->updateManager($id, $name, $address, $phone)) {
                redirect('admins/managers');
            } else {
                // Handle the case where the update fails
                http_response_code(500); // Internal Server Error
                echo 'Update failed';
                exit;
            }
        } else {
            // Retrieve the manager's data from the database
            $this->view('admins/managers');
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Pharmacies/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function all_pharmacies()
    {

        $allPharmacies = $this->adminModel->getPharmacyRegistration();

        $data = [
            'users' => $allPharmacies
        ];

        $this->view('admin/all_pharmacies', $data);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Suppliers/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function all_suppliers()
    {

        $allSuppliers = $this->adminModel->getSupplierRegistration();

        $data = [
            'allSuppliers' => $allSuppliers
        ];

        $this->view('admin/all_suppliers', $data);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Messages/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function messages()
    {
        //Sanitize inputs
        $inboxMessages = $this->adminModel->getInboxMessages();
        $sentMessages = $this->adminModel->getSentMessages();
        $pharmacyList = $this->adminModel->getPharmacyList();
        $supplierList = $this->adminModel->getSupplierList();

        $data = [
            'inboxMessages' => $inboxMessages,
            'sentMessages' => $sentMessages,
            'pharmacy' => $pharmacyList,
            'supplier' => $supplierList,
        ];

        $this->view('admin/messages/messages', $data);
    }

    public function messagePharmacy($id)
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacy = $this->adminModel->getPharmacyMessageById($id);
        $pharmacyDetails = $this->adminModel->getPharmacyDetails($id);
        $contactPharmacy = $this->adminModel->getPharmacyByUserId($id);


        $data = [
            'pharmacy' => $pharmacy,
            'pharmacyDetails' => $pharmacyDetails,
            'contactPharmacy' => $contactPharmacy,
            'receiver' => '',
            'topic_err' => '',
            'description_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Validate data
            $data = [
                'pharmacy' => $pharmacy,
                'pharmacyDetails' => $pharmacyDetails,
                'receiver' => trim($_POST['receiver']),
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
                if ($this->adminModel->sendMessage($data)) {
                    // Redirect to order
                    redirect('admins/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/messages/messagePharmacy', $data);
            }
        }

        $this->view('admin/messages/messagePharmacy', $data);
    }

    public function contactPharmacy($id)
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $pharmacyDetails = $this->adminModel->getPharmacyByUserId($id);


        $data = [
            'pharmacy' => $pharmacyDetails,
            'receiver' => '',
            'topic_err' => '',
            'description_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Validate data
            $data = [
                'pharmacy' => $pharmacyDetails,
                'receiver' => trim($_POST['pharmacyEmail']),
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
                if ($this->adminModel->sendMessage($data)) {
                    // Redirect to order
                    redirect('admins/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/messages/messagePharmacy', $data);
            }
        }

        $this->view('admin/messages/messagePharmacy', $data);
    }

    public function messageSupplier($id)
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $supplier = $this->adminModel->getSupplierMessageById($id);
        $supplierDetails = $this->adminModel->getSupplierDetails($id);
        $contactSupplier = $this->adminModel->getSupplierByUserId($id);


        $data = [
            'supplier' => $supplier,
            'supplierDetails' => $supplierDetails,
            'contactSupplier' => $contactSupplier,
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
                'receiver' => trim($_POST['receiver']),
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
                if ($this->adminModel->sendMessage($data)) {
                    // Redirect to order
                    redirect('admins/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/messages/messageSupplier', $data);
            }
        }

        $this->view('admin/messages/messageSupplier', $data);
    }

    public function contactSupplier($id)
    {
        // Sanitize post inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $supplierDetails = $this->adminModel->getSupplierByUserId($id);


        $data = [
            'supplier' => $supplierDetails,
            'receiver' => '',
            'topic_err' => '',
            'description_err' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Validate data
            $data = [
                'supplier' => $supplierDetails,
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
                if ($this->adminModel->sendMessage($data)) {
                    // Redirect to order
                    redirect('admins/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admin/messages/messageSupplier', $data);
            }
        }

        $this->view('admin/messages/messageSupplier', $data);
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
                if ($this->adminModel->addMessage($data)) {
                    // Redirect to order
                    redirect('admins/messages');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('admins/messages', $data);
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
            $this->view('admin/messages', $data);
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////All Orders/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function all_orders()
    {
        // $adminId = trim($_SESSION['USER_DATA']['id']);
        $pharmacyName = '';
        $supplierName = '';
        $pharmacyReceivedOrders = $this->adminModel->getPharmacyReceivedOrders();
        $pharmacyReceivedOrderById = $this -> adminModel -> getPharmacyReceivedOrderById($pharmacyName);
        $supplierDeliveredOrders = $this->adminModel->getSupplierDeliveredOrders();
        $supplierDeliveredOrderById = $this -> adminModel -> getSupplierDeliveredOrderById($supplierName);
        $supplierRejectedOrders = $this->adminModel->getSupplierRejectedOrders();
        $supplierRejectedOrderById = $this -> adminModel -> getSupplierRejectedOrderById($supplierName);
        $pharmacyRejectedOrders = $this->adminModel->getPharmacyRejectedOrders();
        $pharmacyRejectedOrderById = $this -> adminModel -> getPharmacyRejectedOrderById($pharmacyName);
        $pharmacyCancelledOrders = $this->adminModel->getPharmacyCancelledOrders();
        $pharmacyCancelledOrderById = $this -> adminModel -> getPharmacyCancelledOrderById($pharmacyName);
        $supplierCancelledOrders = $this->adminModel->getSupplierCancelledOrders();
        $supplierCancelledOrderById = $this -> adminModel -> getSupplierCancelledOrderById($supplierName);

        $data = [
            'pharmacyReceivedOrders' => $pharmacyReceivedOrders,
            'pharmacyReceivedOrderById' => $pharmacyReceivedOrderById,
            'supplierDeliveredOrders' => $supplierDeliveredOrders,
            'supplierDeliveredOrderById' => $supplierDeliveredOrderById,
            'supplierRejectedOrders' => $supplierRejectedOrders,
            'supplierRejectedOrderById' => $supplierRejectedOrderById,
            'pharmacyRejectedOrders' => $pharmacyRejectedOrders,
            'pharmacyRejectedOrderById' => $pharmacyRejectedOrderById,
            'supplierCancelledOrders' => $supplierCancelledOrders,
            'supplierCancelledOrderById' => $supplierCancelledOrderById,
            'pharmacyCancelledOrders' => $pharmacyCancelledOrders,
            'pharmacyCancelledOrderById' => $pharmacyCancelledOrderById,
            'search' => '',

        ];
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get search term
            $searchTerm = trim($_POST['search']);

            // Get medicines based on search term
            $pharmacyReceivedOrders = $this->adminModel->getSearchPharmacyReceivedOrders($searchTerm);
            $supplierDeliveredOrders = $this->adminModel->getSearchSupplierDeliveredOrders($searchTerm);
            $supplierRejectedOrders = $this->adminModel->getSearchSupplierRejectedOrders($searchTerm);
            $pharmacyRejectedOrders = $this->adminModel->getSearchPharmacyRejectedOrders($searchTerm);
            $pharmacyCancelledOrders = $this->adminModel->getSearchPharmacyCancelledOrders($searchTerm);
            $supplierCancelledOrders = $this->adminModel->getSearchSupplierCancelledOrders($searchTerm);

            // Update data array with search results
            $data = [
                'pharmacyReceivedOrders' => $pharmacyReceivedOrders,
                'supplierDeliveredOrders' => $supplierDeliveredOrders,
                'supplierRejectedOrders' => $supplierRejectedOrders,
                'pharmacyRejectedOrders' => $pharmacyRejectedOrders,
                'supplierCancelledOrders' => $supplierCancelledOrders,
                'pharmacyCancelledOrders' => $pharmacyCancelledOrders,
                'pharmacyReceivedOrderById' => $pharmacyReceivedOrderById,
                'pharmacyRejectedOrderById' => $pharmacyRejectedOrderById,
                'pharmacyCancelledOrderById' => $pharmacyCancelledOrderById,
                'supplierDeliveredOrderById' => $supplierDeliveredOrderById,
                'supplierRejectedOrderById' => $supplierRejectedOrderById,
                'supplierCancelledOrderById' => $supplierCancelledOrderById,
                'search' => $searchTerm,
                'searchResults' => ''
            ];
        }
        $this->view('admin/all_orders/all_orders', $data);
    }

    public function showPharmacyReceivedOrderDetails($pharmacyName)
    {
        // Fetch the order details for the specified pharmacy
        $pharmacyReceivedOrderDetails = $this->adminModel->getpharmacyReceivedOrderDetails($pharmacyName);

        $data = [
            'orderDetails' => $pharmacyReceivedOrderDetails
        ];

        // Load view with order details
        $this->view('admin/all_orders/pharmacyReceivedOrderDetails', $data);
    }


    public function showPharmacyRejectedOrderDetails($pharmacyName)
    {
        // Fetch the order by its ID
        $pharmacyRejectedOrderDetails = $this->adminModel->getPharmacyRejectedOrderDetails($pharmacyName);

        $data = [
            'orderDetails' => $pharmacyRejectedOrderDetails
        ];

        // Load view with inventory item data
        $this->view('admin/all_orders/pharmacyRejectedOrderDetails', $data);
    }

    public function showPharmacyCancelledOrderDetails($pharmacyName)
    {
        // Fetch the order by its ID
        $pharmacyCancelledOrderDetails = $this->adminModel->getPharmacyCancelledOrderDetails($pharmacyName);

        $data = [
            'orderDetails' => $pharmacyCancelledOrderDetails
        ];

        // Load view with inventory item data
        $this->view('admin/all_orders/pharmacyCancelledOrderDetails', $data);
    }

    public function showSupplierDeliveredOrderDetails($supplierName)
    {
        // Fetch the order details for the specified supplier
        $supplierDeliveredOrderDetails = $this->adminModel->getSupplierDeliveredOrderDetails($supplierName);

        $data = [
            'orderDetails' => $supplierDeliveredOrderDetails
        ];

        // Load view with order details
        $this->view('admin/all_orders/supplierDeliveredOrderDetails', $data);
    }

    public function showSupplierRejectedOrderDetails($supplierName)
    {
        // Fetch the order details for the specified supplier
        $supplierRejectedOrderDetails = $this->adminModel->getSupplierRejectedOrderDetails($supplierName);

        $data = [
            'orderDetails' => $supplierRejectedOrderDetails
        ];

        // Load view with order details
        $this->view('admin/all_orders/supplierRejectedOrderDetails', $data);
    }

    public function showSupplierCancelledOrderDetails($supplierName)
    {
       // Fetch the order details for the specified supplier
       $supplierCancelledOrderDetails = $this->adminModel->getSupplierCancelledOrderDetails($supplierName);

       $data = [
           'orderDetails' => $supplierCancelledOrderDetails
       ];

       // Load view with order details
       $this->view('admin/all_orders/supplierCancelledOrderDetails', $data);
    }
    


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////Profile/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function profile()
    {
        // Fetch the profile data from the model
        $profile = $this->adminModel->getProfile();

        // Pass the profile data to the view
        $data = [
            'profile' => $profile,
            'newPassword_err' => '',
            'confirmPassword_err' => '',
            'email_err' => '',
            'phone_err' => ''

        ];

        // Load the profile view and pass the data
        $this->view('admin/profile', $data);
    }

    public function changeContactNumber()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->adminModel->getProfile();

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
                if ($this->adminModel->updateContactNumber($data['currentContactNumber'], $data['newContactNumber'])) {
                    redirect('admins/profile');
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
            $profile = $this->adminModel->getProfile();

            // Get current email address and new email address 
            $data = [
                'profile' => $profile,
                'currentEmail' => trim($_POST['currentEmail']),
                'newEmail' => trim($_POST['newEmail']),
                'email_err' => '',
            ];

            // Validate input fields
            if (empty($data['newEmail'])) {
                $data['email_err'] = 'Please Enter New Email Address';
            } elseif ($data['currentEmail'] == $data['newEmail']) {
                $data['email_err'] = 'New email address same as Current email address';
            } elseif (!preg_match('/[@]/', $data['newEmail'])) {
                $data['email_err'] = 'Please use the correct format';
            }

            if (empty($data['email_err'])) {
                // Update the email
                if ($this->adminModel->updateEmail($data['currentEmail'], $data['newEmail'])) {
                    // Email updated successfully
                    redirect('admins/profile');
                } else {
                    http_response_code(400); // Bad Request
                    echo 'Failed to update email address';
                }
            } else {
                // Return the error message to the popup
                http_response_code(400); // Bad Request
                echo $data['email_err'];
            }
        }
    }


    public function changePassword()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->adminModel->getProfile();

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
                if ($this->adminModel->updatePassword($data['newPassword'], $data['confirmPassword'])) {
                    // Redirect to profile page
                    redirect('admins/profile');
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
    ///////////////////////////////////////////////////////Logout/////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function logout()
    {
        unset($_SESSION['USER_DATA']);
        redirect('users/login');
    }
}
