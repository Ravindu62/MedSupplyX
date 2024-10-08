<?php
class Users extends Controller {
    public $userModel;
    public function __construct() {
        $this->userModel = $this->model('User');
    }
    public function pharmacy() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'licenceno' => trim($_POST['licenceno']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'address_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'licenceno_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'licence_err' => ''
            ];
            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if($this->userModel->findRejectedEmailPharmacy($data['email'])) {
                    $data['email_err'] = 'Your email has been rejected by Manager. Please <a href="<?php echo URLROOT ?>/pages/index/#contact"> contact us </a>.';
                }elseif($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            // Validate name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }
            // Validate phone
            if(empty($data['phone'])) {
                $data['phone_err'] = 'Please enter phone number';
            }
            // Validate licenceNo
            if(empty($data['licenceno'])) {
                $data['licenceno_err'] = 'Please enter licence number';
            } else {
                //check licence
                if($this->userModel->findUserByPharmacyLicence($data['licenceno'])) {
                    $data['licenceno_err'] = 'Your Pharmacy has already registered.';
                }
            }
            // Validate password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            } elseif (!preg_match('/[A-Z]/', $data['password'])) {
                $data['password_err'] = 'Password should contain at least one uppercase letter';
            } elseif (!preg_match('/[a-z]/', $data['password'])) {
                $data['password_err'] = 'Password should contain at least one lowercase letter';
            } elseif (!preg_match('/\d/', $data['password'])) {
                $data['password_err'] = 'Password should contain at least one number';
            } elseif (!preg_match('/[^a-zA-Z\d]/', $data['password'])) {
                $data['password_err'] = 'Password should contain at least one special character';
            }
            // Validate confirm password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            //validate licence document is empty before sumbit
            if(empty($_FILES['licence']['name'])) {
                $data['licence_err'] = 'Please upload your licence';
            } else {
                $allowed =  array('pdf');
                $filename = $_FILES['licence']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext,$allowed) ) {
                    $data['licence_err'] = 'Please upload a valid pdf file';
                }
            }
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err']) && empty($data['phone_err']) && empty($data['licenceno_err']) && empty($data['licence_err'])) { 
            // Hash password
               // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            // autochange filename if exist file with same name and upload
            $filename = $_FILES['licence']['name'];
            $tempname = $_FILES['licence']['tmp_name'];
            $folder = "C:/xampp/htdocs/MedSupplyX/public/uploads/PharmacyLicence/";
            $i = 0;
            $parts = pathinfo($filename);
            while (file_exists($folder . $filename)) {
                $i++;
                $filename = $parts['filename'] . "-" . $i . "." . $parts['extension'];
            }
            move_uploaded_file($tempname, $folder.$filename);
            $data['licence'] = $filename;
            // Register user
                if($this->userModel->pharmacy($data)) {
                    redirect('users/complete');
                } else {
                    die('Something went wrong');
                }
            } else {
            // Load view with errors
                $this->view('users/pharmacy', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'address' => '',
                'phone' => '',
                'email' => '',
                'licenceno' => '',
                'password' => '',
                'confirm_password' => '',
                'licence' => '',
                'name_err' => '',
                'address_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'licenceno_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'licence_err' => ''
            ];
            // Load view
            $this->view('users/pharmacy', $data);
        }
    }
    public function supplier() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'licenceno' => trim($_POST['licenceno']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'address_err' => '',
                'phone_err' => '',
                'licenceno_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'licence_err' => ''
            ];
            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                //check email is rejected
                if($this->userModel->findRejectedEmailSupplier($data['email'])) {
                    $data['email_err'] = 'Your email has been rejected Please contact us';
                } elseif($this->userModel->findUserByEmailSupplier($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            // Validate name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }
            // Validate phone
            if(empty($data['phone'])) {
                $data['phone_err'] = 'Please enter phone number';
            }
            // Validate licenceNo
            if(empty($data['licenceno'])) {
                $data['licenceno_err'] = 'Please enter licence number';
            } else {
                //check licence
                if($this->userModel->findUserBySupplierLicence($data['licenceno'])) {
                    $data['licenceno_err'] = 'Your Company has already registered.';
                }
            }
            // Validate password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            } 
            // Validate confirm password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            //validate licence document is empty before sumbit
            if(empty($_FILES['licence']['name'])) {
                $data['licence_err'] = 'Please upload your licence';
            } else {
                $allowed =  array('pdf');
                $filename = $_FILES['licence']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext,$allowed) ) {
                    $data['licence_err'] = 'Please upload a valid pdf file';
                }
            }
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err']) && empty($data['phone_err']) && empty($data['licenceno_err']) && empty($data['licence_err'])) {
            // Hash password
               // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            // autochange filename if exist file with same name and upload
            $filename = $_FILES['licence']['name'];
            $tempname = $_FILES['licence']['tmp_name'];
            $folder = "C:/xampp/htdocs/MedSupplyX/public/uploads/supplierLicence/";
            $i = 0;
            $parts = pathinfo($filename);
            while (file_exists($folder . $filename)) {
                $i++;
                $filename = $parts['filename'] . "-" . $i . "." . $parts['extension'];
            }
            move_uploaded_file($tempname, $folder.$filename);
            $data['licence'] = $filename;
            // Register user
                if($this->userModel->supplier($data)) {
                    redirect('users/complete');
                } else {
                    die('Something went wrong');
                }
            } else {
            // Load view with errors
                $this->view('users/supplier', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'address' => '',
                'phone' => '',
                'licenceno' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'address_err' => '',
                'phone_err' => '',
                'licenceno_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'licence_err' => ''
            ];
            // Load view
            $this->view('users/supplier', $data);
        }
    }

    public function login() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];
            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            // Validate password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
           // Check for user/email
              if($this->userModel->findUserByEmail($data['email'])) {
                if($this->userModel->checkStatus($data['email'])) {
                    // User found
                  } else {
                    // User not found
                    $data['email_err'] = 'Your account is not activated';
                }
                // User found
              } else {
                // User not found
                $data['email_err'] = 'No user found';
              }
            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])) {
            // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }
                } else {
                    // Load view with errors
                    $this->view('users/login', $data); 
                }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            // Load view
            $this->view('users/login', $data);
        }
    }
    

   
    public function createCashierSession($cashier){
        $_SESSION['cashier_id'] = $cashier->id;
        $_SESSION['cashier_email'] = $cashier->email;
        $_SESSION['cashier_name'] = $cashier->name;
        redirect('cashiers/index');
    }
     public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('pharmacies/index');
     }

     public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
     }
        public function isLoggedIn() {
            if(isset($_SESSION['user_id'])) {
                return true;
            } else {
                return false;
            }
        }
public function register(){
    $this->view('users/register');
    $data = [
        'title' => 'Register '
    ];
}
public function complete(){
    $this->view('users/complete');
    $data = [
        'title' => 'Register '
    ];
}
public function index(){
    $this->view('pages/index');
}

public function forgotpassword(){
    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'email' => trim($_POST['email']),
            'password' => '',
            'email_err' => ''
        ];
        // Validate email
        if(empty($data['email'])) {
            $data['email_err'] = 'Please enter email';
        } else {
            // Check email
            if($this->userModel->isEmailAvailable($data)) {
                $data['email_err'] = 'No user found';
            }
        }
        // Make sure errors are empty
        if(empty($data['email_err'])) {
            // Validated
            //getpassword
            $password = $this->userModel->getPasswordByEmail($data['email']);
            $name= $this->userModel->getNameByEmail($data['email']);

            $data = [
                'email' => $data['email'],
                'password' => $password ,
                'name' => $name ,
                'email_err' => ''
            ];
            // Check and set logged in user
            $mail = new Mail();
            $mail->sendForgotPasswordEmail($data['email'] , $data['name'], $data['password']);
            // rediect to sentmail page
            redirect('users/sentmail');
        } else {
            // Load view with errors

            $this->view('users/forgotpassword', $data);
        }
    } else {
        // Init data
        $data = [
            'email' => '',
            'password' => '',
            'email_err' => ''
        ];
        // Load view
        $this->view('users/forgotpassword', $data);
    }
}

    public function sentmail(){
        $this->view('users/sentmail');
        
}
}
?>