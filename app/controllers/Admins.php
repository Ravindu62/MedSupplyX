<?php
 class Admins extends Controller {

    Public $adminModel;
    public function __construct() {
        $this->adminModel = $this->model('Admin');
    }

public function index() {
        $countPharmacy = $this->adminModel->countPharmacies();
        $countSuppliers = $this->adminModel->countSuppliers();
        $countManagers = $this->adminModel->countManagers();
        $countMessages = $this->adminModel->countMessages();

        $data = [
            'countPharmacies' => $countPharmacy,
            'countSuppliers' => $countSuppliers,
            'countManagers' => $countManagers,
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

    $managers = $this->adminModel->getManager();

    $data = [
        'managers' => $managers
    ];
    
    $this->view('admin/managers', $data);

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

public function history() {
    $data = [];
    
    $this->view('admin/history', $data);

}

public function profile() {
    $data = [];
    
    $this->view('admin/profile', $data);

}

public function logout() {
    unset($_SESSION['USER_DATA']);
    redirect('users/login');
 }



}
