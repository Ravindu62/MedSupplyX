<?php
 class Admins extends Controller {

    Public $adminModel;
    public $userModel;
    Public $db;


    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }

public function index() {
        $countPharmacies = $this ->adminModel -> countPharmacies();
        $countapprovedPharmacy = $this->adminModel->countapprovedPharmacies();
        $countpendingPharmacy = $this->adminModel->countpendingPharmacies();
        $countrejectedPharmacy = $this-> adminModel->countrejectedPharmacies();
        $countSuppliers = $this -> adminModel->countSuppliers();
        $countapprovedSuppliers = $this->adminModel->countapprovedSuppliers();
        $countpendingSuppliers = $this->adminModel->countpendingSuppliers();
        $countrejectedSuppliers = $this->adminModel->countrejectedSuppliers();
        $countManagers = $this->adminModel->countManagers();
        $countOrders = $this->adminModel->countOrders();
        $countMedicines = $this->adminModel->countMedicines();
        $countMessages = $this->adminModel->countMessages();

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
    
        $this->view('admin/dashboard/index', $data);

}

public function approvedPharmacy(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $approvedPharmacy = $this->adminModel->approvedPharmacy();

    $data =[
        'approvedPharmacy'=>$approvedPharmacy
    ];
    $this->view('admin/dashboard/approvedPharmacy',$data);
}

public function pendingPharmacy(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $pendingPharmacy = $this->adminModel->pendingPharmacy();

    $data =[
        'pendingPharmacy'=>$pendingPharmacy
    ];
    $this->view('admin/dashboard/pendingPharmacy',$data);
}

public function rejectedPharmacy(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $rejectedPharmacy = $this->adminModel->rejectedPharmacy();

    $data =[
        'rejectedPharmacy'=>$rejectedPharmacy
    ];
    $this->view('admin/dashboard/rejectedPharmacy',$data);
}

public function approvedSupplier(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $approvedSupplier = $this->adminModel->approvedSupplier();

    $data =[
        'approvedSupplier'=>$approvedSupplier
    ];
    $this->view('admin/dashboard/approvedSupplier',$data);
}

public function pendingSupplier(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $pendingSupplier = $this->adminModel->pendingSupplier();

    $data =[
        'pendingSupplier'=>$pendingSupplier
    ];
    $this->view('admin/dashboard/pendingSupplier',$data);
}

public function rejectedSupplier(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $rejectedSupplier = $this->adminModel->rejectedSupplier();

    $data =[
        'rejectedSupplier'=>$rejectedSupplier
    ];
    $this->view('admin/dashboard/rejectedSupplier',$data);
}

public function medicines() {
    $medicines = $this->adminModel->medicines();
    $data = [
        'medicines' => $medicines
    ];
    
    
    $this->view('admin/dashboard/medicines', $data);

}

public function managerRegistration() {

    // Register manager
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        if(empty($data['mname'])) {
            $data['mname_err'] = 'Please enter name';
       
        }

        if(empty($data['memail'])) {
            $data['memail_err'] = 'Please enter email';
        } else {
            // Check email
            if($this->adminModel->findManagerByEmail($data['memail'])) {
                $data['memail_err'] = 'Email is already taken';
            }
        }

        if(empty($data['mpassword'])) {
            $data['mpassword_err'] = 'Please enter password';
        } elseif(strlen($data['mpassword']) < 6) {
            $data['mpassword_err'] = 'Password must be at least 6 characters';
        }

        if(empty($data['confirm_password'])) {
            $data['confirm_password_err'] = 'Please confirm password';
        } else {
            if($data['mpassword'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        }


        if(empty($data['mphone'])) {
            $data['mphone_err'] = 'Please enter phone number';
        }

        if(empty($data['maddress'])) {
            $data['maddress_err'] = 'Please enter address';
        }

        // Make sure errors are empty
        if(empty($data['mname_err']) && empty($data['memail_err']) && empty($data['mpassword_err']) && empty($data['confirm_password_err']) && empty($data['mphone_err']) && empty($data['maddress_err'])) {
            // Validated
            // Hash Password
          //  $data['mpassword'] = password_hash($data['mpassword'], PASSWORD_DEFAULT);
            // Register Manager
            if($this->adminModel->regManager($data)) {
                $this->view('popup/registered');
                redirect('admins/managerRegistration');
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


public function managers() {

    $manager = $this->adminModel->getManager();

    $data = [
        'managers' => $manager
    ];
    
    $this->view('admin/managers', $data);

}


public function deleteManager($id) {
    if($this->adminModel->deleteManager($id)) {
        redirect('admins/managers');
    } else {
        die('Something went wrong');
    }
}


public function updateManager($id) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the manager's current data from the database
        $currentManager = $this->adminModel->getManagerById($id);

        // Assign the current data to variables
        $name = $currentManager->name;
        $address = $currentManager->address;
        $phone = $currentManager->phone;
        $email = $currentManager->email;

        // Check if the posted data is not empty and update the corresponding variables
        if (!empty($_POST['newName'])) {
            $name = $_POST['newName'];
        }
        if (!empty($_POST['newAddress'])) {
            $address = $_POST['newAddress'];
        }
        if (!empty($_POST['newPhone'])) {
            $phone = $_POST['newPhone'];
        }

        // Update the manager in your database
        if ($this->adminModel->updateManager($id, $name, $address, $phone)) {
            redirect('admins/managers');
        } else {
            // Handle the case where the update fails
            die('Update failed');
        }
    } else {
        // Retrieve the manager's data from the database
        $manager = $this->adminModel->getManagerById($id);
        $data = [
            'manager' => $manager
        ];
        $this->view('admins/managers', $data); // Assuming your view file is named manager.php
    }
}


public function all_pharmacies() {

    $allPharmacies = $this->adminModel->getPharmacyRegistration();
    
    $data = [
        'users' => $allPharmacies
    ];
    
    $this->view('admin/all_pharmacies', $data);
}

public function all_suppliers() {

    $allSuppliers = $this->adminModel->getSupplierRegistration();
        
    $data = [
        'allSuppliers' => $allSuppliers
    ];
    
    $this->view('admin/all_suppliers', $data);

}

public function messages()
    {
        //Sanitize inputs
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $messages = $this->adminModel->getMessages();

        $data = [
            'messages' => $messages
        ];

        $this->view('admin/messages', $data);
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
                'sender' => trim($_SESSION['USER_DATA']['name']),
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

            if (empty($data['sender'])) {
                $data['sender_err'] = 'Please enter the sender';
            }

            if (empty($data['heading'])) {
                $data['heading_err'] = 'Please enter the heading';
            }

            if (empty($data['message'])) {
                $data['message_err'] = 'Please enter the message';
            }

            // Make sure no errors
            if (empty($data['receiver_err']) && empty($data['sender_err']) && empty($data['heading_err']) && empty($data['message_err'])) {
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
            $this->view('admins/messages', $data);
        }
    }


public function advertistments() {
    $data = [];
    
    $this->view('admin/advertistments', $data);

}


public function all_orders() {
    $data = [];
    
    $this->view('admin/all_orders', $data);

}

public function profile() {
    // Fetch the profile data from the model
    $profile = $this->adminModel->getProfile();

    // Pass the profile data to the view
    $data = [
        'profile' => $profile,
        'newPassword_err' => '',
        'confirmPassword_err' => '',
        'email_err' => '',
        'phone_err' => '',

    ];
    
    // Load the profile view and pass the data
    $this->view('admin/profile', $data);
}

public function changeContactNumber()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->adminModel->getProfile();
            // Get current contact number and new contact number from the form
            $data =[
                'profile' => $profile,
                'currentContactNumber' => $_POST['currentContactNumber'],
                'newContactNumber' => $_POST['newContactNumber'],
                'phone_err' => '',
            ];

            if (empty($data['newContactNumber'])) {
                $data['phone_err'] = 'Please enter the new contact number';
            }

            if (empty($data['phone_err'])) {

            // Update the contact number in the database
             if($this->adminModel->updateContactNumber($data['currentContactNumber'], $data['newContactNumber'])) {
                $this->view('admins/profile', $data);
            }  
        }
        $this->view('admins/profile', $data);
    }
    
}

    public function changeEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->adminModel->getProfile();

            $data = [
                'profile' => $profile,
                'currentEmail' => trim($_POST['currentEmail']),
                'newEmail' => trim($_POST['newEmail']),
                'email_err' => '',
            ];

                if (empty($data['newEmail'])) {
                    $data['email_err'] = 'Please enter the new email address';
                }

                if (empty($data['email_err'])) {
                // Update the email
                    if ($this->adminModel->updateEmail($data['currentEmail'], $data['newEmail'])) {
                        // Email updated successfully
                        $this->view('admins/profile', $data);
                    } 
            } 
            $this->view('admin/profile', $data);
        }
       
    }


    public function changePassword() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $profile = $this->adminModel->getProfile();
    
            $data = [
                'profile' => $profile,
                'newPassword' => trim($_POST['newPassword']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'newPassword_err' => '',
                'confirmPassword_err' => '',
            ];
            // print_r($data);die();
    
            if (empty($data['newPassword'])) {
                $data['newPassword_err'] = 'Please Enter New Password';
            } elseif (strlen($data['newPassword']) < 6 || strlen($data['newPassword']) > 30) {
                $data['newPassword_err'] = 'Password must be between 8 and 30 characters';
            } 
    
            if (empty($data['confirmPassword'])) {
                $data['confirmPassword_err'] = 'Please confirm password';
            } elseif ($data['newPassword'] != $data['confirmPassword']) {
                $data['newPassword_err'] = 'Passwords do not match';
            }
    
            if (empty($data['newPassword_err']) && empty($data['confirmPassword_err'])) {
                if ($this->adminModel->updatePassword($data['newPassword'],$data['confirmPassword'])) {
                    $this->view('admins/profile', $data);
                }
            }
    
            $this->view('admin/profile', $data);
        }
    }
    


public function logout() {
    unset($_SESSION['USER_DATA']);
    redirect('users/login');
 }

}
