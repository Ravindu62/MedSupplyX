<?php
 class Admins extends Controller {

    Public $adminModel;
    public $userModel;
    Public $db;


    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }

public function index() {
        $countapprovedPharmacy = $this->adminModel->countapprovedPharmacies();
        $countpendingPharmacy = $this->adminModel->countpendingPharmacies();
        $countapprovedSuppliers = $this->adminModel->countapprovedSuppliers();
        $countpendingSuppliers = $this->adminModel->countpendingSuppliers();
        $countManagers = $this->adminModel->countManagers();
        $countOrders = $this->adminModel->countOrders();
        $countMessages = $this->adminModel->countMessages();

        $data = [
            'countapprovedPharmacies' => $countapprovedPharmacy,
            'countpendingPharmacies' => $countpendingPharmacy,
            'countapprovedSuppliers' => $countapprovedSuppliers,
            'countpendingSuppliers' => $countpendingSuppliers,
            'countManagers' => $countManagers,
            'countOrders' => $countOrders,
            'countMessages' => $countMessages
        ];
    
        $this->view('admin/index', $data);

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
        if (!empty($_POST['newEmail'])) {
            $email = $_POST['newEmail'];
        }

        // Update the manager in your database
        if ($this->adminModel->updateManager($id, $name, $address, $phone, $email)) {
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

    $allPharmacies = $this->adminModel->getApprovedPharmacyRegistration();
    
    $data = [
        'users' => $allPharmacies
    ];
    
    $this->view('admin/all_pharmacies', $data);
}

public function all_suppliers() {

    $allSuppliers = $this->adminModel->getApprovedSupplierRegistration();
        
    $data = [
        'allSuppliers' => $allSuppliers
    ];
    
    $this->view('admin/all_suppliers', $data);

}

public function messages() {
    $data = [];
    
    $this->view('admin/messages', $data);

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
        'profile' => $profile
    ];
    
    // Load the profile view and pass the data
    $this->view('admin/profile', $data);
}

public function changeContactNumber()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get current contact number and new contact number from the form
            $currentContactNumber = $_POST['currentContactNumber'];
            $newContactNumber = $_POST['newPhone'];

            // Validate the new contact number if needed

            // Update the contact number in the database
            if ($this->adminModel->updateContactNumber($currentContactNumber, $newContactNumber)) {
                redirect('admins/profile');
            } else {
                redirect('admins/profile');
            }
        } else {
            redirect('admins/profile');
        }
    }

    public function changeEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $currentEmail = trim($_POST['currentEmail']);
            $newEmail = trim($_POST['newEmail']);


            // Check if the current email exists
            if ($this->adminModel->findAdminByEmail($currentEmail)) {
                // Update the email
                if ($this->adminModel->updateEmail($currentEmail, $newEmail)) {
                    // Email updated successfully
                    redirect('admins/profile');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Current email not found
                redirect('admins/profile');
            }
        } else {
            redirect('admins/profile');
        }
    }
    
    






public function logout() {
    unset($_SESSION['USER_DATA']);
    redirect('users/login');
 }

}
