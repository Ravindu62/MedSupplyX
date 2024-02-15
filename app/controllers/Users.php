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
                'confirm_password_err' => ''
                
            ];

            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])) {
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
            } 

            // Validate confirm password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err']) && empty($data['phone_err']) && empty($data['licenceno_err'])) {    

            // Hash password
               // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

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
                'name_err' => '',
                'address_err' => '',
                'phone_err' => '',
                'email_err' => '',
                'licenceno_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''

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
                'confirm_password_err' => ''
            ];



            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if($this->userModel->findUserByEmailSupplier($data['email'])) {
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

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err']) && empty($data['phone_err']) && empty($data['licenceno_err'])) {

            // Hash password
               // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

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
                'confirm_password_err' => ''
            ];

            // Load view
            $this->view('users/supplier', $data);
        }



    




    }

    public function cashier() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'licence' => trim($_POST['licence']),
                'phone' => trim($_POST['phone']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'phone_err' => '',
                'password_err' => '',
                'licence_err'=>'',
                'confirm_password_err' => ''
            ];




            // Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                // Check email
                if($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate name
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate licence
            if(empty($data['licence'])) {
                $data['licence_err'] = 'Please enter licence number';
            } 

            // Validate phone
            if(empty($data['phone'])) {
                $data['phone_err'] = 'Please enter phone number';
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

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['address_err']) && empty($data['phone_err'])) {

            // Hash password
                // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            // Register user
                if($this->userModel->cashier($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                    
                } else {
                    die('Something went wrong');
                }
                
            } else {

            // Load view with errors
                $this->view('users/cashier', $data);
            }

        } else {
                
                // Init data
                $data = [
                    'name' => '',
                    'licence' => '',
                    'phone' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'phone_err' =>'',
                    'licence_err'=>'',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
    
                // Load view
                $this->view('users/cashier', $data);
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

    public function cashierlogin() {
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
              if($this->userModel->findUserByEmailCashier($data['email'])) {
                // User found
              } else {
                // User not found
                $data['email_err'] = 'No user found';
              }
              

            // Make sure errors are empty
            if(empty($data['email_err']) && empty($data['password_err'])) {
            // Validated
                // Check and set logged in user
                $loggedInUser = $this->userModel->cashierlogin($data['email'], $data['password']);

                if($loggedInUser) {
                    // Create Session
                    $this->createCashierSession($loggedInUser);
                    
                } else {
                    $data['password_err'] = 'Password incorrect';

                    $this->view('cashier/login', $data);
                }

                } else {
                    // Load view with errors
                    $this->view('cashier/login', $data); 
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
            $this->view('cashier/login', $data);
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
}
?>


