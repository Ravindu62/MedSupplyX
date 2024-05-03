<?php
class Managers extends Controller
{
    public $managerModel;
    public $userModel;
    public $db;
    public function __construct()
    {
        $this->managerModel = $this->model('Manager');
        if (!Auth::is_manager()) {
            redirect('users/login');
        }          
       

      
    }
    public function index() {
    
        $countPharmacy = $this->managerModel->countPharmacies();
        $countSuppliers = $this->managerModel->countSuppliers();
        $countMedicines = $this->managerModel->countMedicines();
        $countRequests = $this->managerModel->countRequests();
        $data = [
            'countPharmacies' => $countPharmacy,
            'countSuppliers' => $countSuppliers,
            'countMedicines' => $countMedicines,
            'countRequests' => $countRequests
        ];
        $this->view('manager/index', $data);
    }
    public function registration()
    {
        $pharmacyRegistration = $this->managerModel->getPharmacyRegistration();
        $supplierRegistration = $this->managerModel->getSupplierRegistration();
        $data = [
            'pharmacyRegistration' => $pharmacyRegistration,
            'supplierRegistration' => $supplierRegistration
        ];
        $this->view('manager/registration', $data);
    }

    public function rejectPharmacy($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $pharmacyRegistration = $this->managerModel->getPharmacyById($id);
            // Check for owner
            if ($pharmacyRegistration->pharmacyname != $_SESSION['USER_DATA']['name']) {
                redirect('managers/registration');
            }
            if ($this->managerModel->rejectPharmacy($id)) {
                redirect('managers/registration');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('managers/registration');
        }
    }
    public function rejectSupplier($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get existing post from model
            $supplierRegistration = $this->managerModel->getsupplierById($id);
            // Check for owner
            if ($supplierRegistration->supppliername != $_SESSION['USER_DATA']['name']) {
                redirect('managers/registration');
            }
            if ($this->managerModel->rejectSupplier($id)) {
                redirect('managers/registration');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('managers/registration');
        }
    }
    public function new_brand($medicineId)
    {
        $medicines = $this->managerModel->getMedicineById($medicineId);
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'medicineId' => $medicineId,
                'brandname' => trim($_POST['brandname']),
                'brandname_err' => ''
            ];
            // Validate data
            if (empty($data['brandname'])) {
                $data['brandname_err'] = '*Please enter brand name';
            }
            // Make sure no errors
            if (empty($data['brandname_err'])) {
                // Validated
                // Check brand is exist if not add new brand
                $brand = $this->managerModel->isBrandAvailable($medicineId, $data['brandname']);

                if (!$brand) {
                    // Register user from model function
                    if ($this->managerModel->addBrand($data)) {
                        // Redirect to login
                        redirect('managers/medicines');
                        return;
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    $data['brandname_err'] = 'Brand already exist';
                    $data = [
                        'medicines' => $medicines,
                        'brandname_err' => $data['brandname_err']
                    ];
                    $this->view('manager/new_brand', $data);
                }
            } else {
                // Load view with errors
                $data = [
                    'medicines' => $medicines,
                    'brandname_err' => $data['brandname_err']
                ];
                $this->view('manager/new_brand', $data);
            }
            redirect('managers/medicines');
            return;
        }
        $data = [
            'medicines' => $medicines,
            'brandname_err' => ''
        ];
        $this->view('manager/new_brand', $data);
    }
    public function all_pharmacies()
    {
        $allPharmacies = $this->managerModel->getApprovedPharmacyRegistration();
        $data = [
            'allPharmacies' => $allPharmacies 
            
        ];
        $this->view('manager/all_pharmacies', $data);
    }

    public function deletepharmacy($id)
    {
        $getPharmacyDetails = $this->managerModel->getPharmacyById($id);
        $data = [
            'getPharmacyDetails' => $getPharmacyDetails,
            'reason_err' => ''
        ];

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'getPharmacyDetails' => $getPharmacyDetails,
                'reason' => trim($_POST['reason']),
                'reason_err' => '',
                'id' => $_POST['id']
            ];
            // Validate data
            if (empty($data['reason'])) {
                $data['reason_err'] = '*Please enter reason';
            }
            // Make sure no errors
            if (empty($data['reason_err'])) {
                // Validated
                // Register user from model function
                if ($this->managerModel->deletePharmacy($data)) {

                    $mail = new Mail;
                    $mail->sendAccountDeletedEmail($data['getPharmacyDetails']->email, $data['getPharmacyDetails']->name, $data['reason']);
                    // Redirect to login
                    redirect('managers/all_pharmacies');
                    return;
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('manager/deletepharmacy', $data);
            }
            return;
        }
        $this->view('manager/deletepharmacy', $data);
    }

    public function deletesupplier($id)
    {
        $getSupplierDetails = $this->managerModel->getSupplierById($id);
        $data = [
            'getSupplierDetails' => $getSupplierDetails,
            'reason_err' => ''
        ];

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'getSupplierDetails' => $getSupplierDetails,
                'reason' => trim($_POST['reason']),
                'reason_err' => '',
                'id' => $_POST['id']
            ];
            // Validate data
            if (empty($data['reason'])) {
                $data['reason_err'] = '*Please enter reason';
            }
            // Make sure no errors
            if (empty($data['reason_err'])) {
                // Validated
                // Register user from model function
                if ($this->managerModel->deleteSupplier($data)) {

                    $mail = new Mail;
                    $mail->sendAccountDeletedEmail($data['getSupplierDetails']->email, $data['getSupplierDetails']->name ,$data['reason']);
                    // Redirect to login
                    redirect('managers/all_suppliers');
                    return;
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('manager/deletesupplier', $data);
            }
            return;
        }
        $this->view('manager/deletesupplier', $data);
    }

    public function all_suppliers()
    {
        $allSuppliers = $this->managerModel->getApprovedSupplierRegistration();
        $data = [
            'allSuppliers' => $allSuppliers
        ];
        $this->view('manager/all_suppliers', $data);
    }

    public function medicines() {
        $getMedicines = $this->managerModel->getMedicines();
        $getMedicineBrandsByMedicineId = $this->managerModel->getMedicineBrandsByMedicineId();
        $data = [
            'getMedicines' => $getMedicines,
            'getMedicineBrandsByMedicineId' => $getMedicineBrandsByMedicineId,
            'search' => ''
        ];
    
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Get search term
            $searchTerm = trim($_POST['search']);
    
            // Get medicines based on search term
            $getMedicines = $this->managerModel->getSearchMedicine($searchTerm);
    
            // Update data array with search results
            $data = [
                'getMedicines' => $getMedicines ,
                'search' => $searchTerm,
                'getMedicineBrandsByMedicineId' => $getMedicineBrandsByMedicineId,
                'searchResults' => ''
            ];
        }
          
        $this->view('manager/medicines', $data);
    }


    public function new_medicine()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'mname' => trim($_POST['mname']),
                'refno' => trim($_POST['refno']),
                'category' => trim($_POST['category']),
                'volume' => trim($_POST['volume']),
                'medicineType' => trim($_POST['medicineType']),
                'description' => trim($_POST['description']),
                'brand' => trim($_POST['brand']),
                'manufacturedDate' =>trim($_POST['manufacturedDate']),
                'mname_err' => '',
                'refno_err' => '',
                'category_err' => '',
                'volume_err' => '',
                'medicineType_err' => '',
                'description_err' => '',
                'manufacturedDate_err' =>'',
                'brand_err' => ''
            ];
            
            // Validate data
            if (empty($data['mname'])) {
                $data['mname_err'] = '*Please enter medicine name';
            }

            if(empty($data['refno'])){
                $data['refno_err'] = 'Please enter reference number';
            } elseif (!preg_match('/^MED.{4}$/', $data['refno'])) {
                $data['refno_err'] = 'Reference number must start with "MED" followed by 4 characters.';
            }
            
            if (empty($data['category'])) {
                $data['category_err'] = '*Please enter category';
            }
            if (empty($data['volume'])) {
                $data['volume_err'] = '*Please enter volume';
            }
            //check volume is negative
            if ($data['volume'] < 0) {
                $data['volume_err'] = '*Volume cannot be negative';
            }
            if (empty($data['medicineType'])) {
                $data['medicineType_err'] = '*Please enter medicine type';
            }
            if (empty($data['description'])) {
                $data['description_err'] = '*Please enter description';
            }
            if (empty($data['brand'])) {
                $data['brand_err'] = '*Please enter brand';
            }

            if (empty($data['manufacturedDate'])) {
                $data['manufacturedDate_err'] = '*Please enter Manufactued Date';
            }

            

            //check medicinename , volume , type , brand is already exist
            if ($this->managerModel->isMedicineAvailable($data['mname'], $data['volume'], $data['medicineType'])) {
                $data['mname_err'] = 'This Medicine has already registered';
               
            } 
           
            // Make sure no errors
            if (empty($data['mname_err']) && empty($data['refno_err']) && empty($data['category_err']) && empty($data['volume_err']) && empty($data['medicineType_err']) && empty($data['description_err']) && empty($data['brand_err']) && empty($data['brand_err']) && empty($data['manufacturedDate_err']) ) {
                // Validated
                // Register user from model function
                
                if ($this->managerModel->addMedicine($data)) {
                    // Redirect to login
                    redirect('managers/medicines');
                    return;
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('manager/new_medicine', $data);
            }
            return;
        }
        $data = [
            'mname' => '',
            'refno' => '',
            'category' => '',
            'volume' => '',
            'medicineType' => '',
            'description' => '',
            'brand' => '',
            'manufacturedDate' => '',
            'mname_err' => '',
            'refno_err' => '',
            'category_err' => '',
            'volume_err' => '',
            'medicineType_err' => '',
            'description_err' => '',
            'brand_err' => '',
            'manufacturedDate_err' =>'',
        ];
        $this->view('manager/new_medicine', $data);
    }


    public function messages() {

        $getMessages = $this->managerModel->getMessages();
        $getMyMessageData = $this->managerModel->getMyMessageData();

        $data = [
            'getMessages' => $getMessages,
            'getMyMessageData' => $getMyMessageData
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'getMessages' => $getMessages,
                'getMyMessageData' => $getMyMessageData,
                'managerId' => trim($_SESSION['USER_DATA']['id']),
                'sender' => trim($_SESSION['USER_DATA']['name']),
                'receiver' => trim($_POST['receiver']),
                'heading' => trim($_POST['heading']),
                'message' => trim($_POST['message']),
                'message_err' => ''
            ];
            // Validate data
            if (empty($data['message'])) {
                $data['message_err'] = '*Please enter message';
            }
            // Make sure no errors
            if (empty($data['message_err'])) {
                // Validated
                // Register user from model function
                if ($this->managerModel->newMessage($data)) {
                    // Redirect to login
                    redirect('managers/messages');
                    return;
                } else {
                    die('Something went wrong');
                }

            } else {
                // Load view with errors
                $this->view('manager/messages', $data);
            }
            return;
        }
        $this->view('manager/messages', $data);
        
    }

    public function profile()
    {
        $getUserData = $this->managerModel->getUserData();
        
        $data = [
            'getUserData' => $getUserData,

        ];
        $this->view('manager/profile', $data);
    }
    public function editprofile()
    {
        
        $getUserData = $this->managerModel->getUserData();
        $data = [
            'getUserData' => $getUserData,
            'email_err' => '',
            'oldpassword_err' => '',
            'newpassword_err' => ''
        ];

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'getUserData' => $getUserData,
                'email' => trim($_POST['email']),
                'oldpassword' => trim($_POST['oldpassword']),
                'newpassword' => trim($_POST['newpassword']),
                'id' => $_SESSION['USER_DATA']['id'],
                'email_err' => '',
                'oldpassword_err' => '',
                'newpassword_err' => ''
            ];
            // Validate data
            if (empty($data['email'])) {
                $data['email_err'] = '*Please enter email';
            }
            if (empty($data['oldpassword'])) {
                $data['oldpassword_err'] = '*Please enter old password';
            }
            if (empty($data['newpassword'])) {
                $data['newpassword_err'] = '*Please enter new password';
            }

         
            //check old password is correct
            $getOldpassword=$this->managerModel->checkOldPassword($data['id']);
            if ($getOldpassword->password != $data['oldpassword']) {
                $data['oldpassword_err'] = '*Old password is incorrect';
            }

            //check old password and new password is same
            if ($data['oldpassword'] == $data['newpassword']) {
                $data['newpassword_err'] = '*Old password and new password cannot be same';
            }
           
            // Make sure no errors
            if (empty($data['email_err']) && empty($data['oldpassword_err']) && empty($data['newpassword_err'])) {
                // Validated
                // Register user from model function
                if ($this->managerModel->updateProfile($data)) {
                    // Redirect to login
                    redirect('managers/profile');
                    return;
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('manager/editprofile', $data);
            }
            return;
        }
    
        $this->view('manager/editprofile', $data);
    }



    public function logout()
    {
        unset($_SESSION['USER_DATA']);
        redirect('users/login');
    }

    
    public function approve_supplier()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['acceptsupplier'])) {
                $this->db = new Database;
                $email = $_POST['acceptsupplier'];
                $data = [
                    'email' => $email
                ];
                $keys = array_keys($data);
                $query = "SELECT * FROM supplierregistration WHERE ";
                $conditions = [];
                foreach ($keys as $key) {
                    $conditions[] = $key . "=:" . $key;
                }
                $query .= implode(' AND ', $conditions) . ' ORDER BY id DESC LIMIT 1';
                $res = $this->db->query2($query, $data);
                $name = $res[0]->name;
                $email = $res[0]->email;
                $password = $res[0]->password;
                $id=$res[0]->id;
                $this->db->query('INSERT INTO users (name, email, password , role ,userId) VALUES(:name, :email , :password, :role, :userId)');
                $query2 = "UPDATE supplierregistration SET status = 'approved' WHERE email = :email";
                $this->db->query2($query2, $data);
                // Bind values
                $this->db->bind(':name', $name);
                $this->db->bind(':email',  $email);
                $this->db->bind(':password', $password);
                $this->db->bind(':role', 'supplier');
                $this->db->bind(':userId', $id);
                // Execute
                if ($this->db->execute()) {
                    $mail = new Mail;
                    $mail->sendConfirmationEmailToSupplier($email, $name);
                    header('location: ' . URLROOT . '/managers/registration?success=true');
                    //show alert message 
                    
                    return true;
                } else {
                    return false;
                }
                header('location: ' . URLROOT . '/managers/registration?error=true');
            }
        }
    }
    public function approve_pharmacy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['acceptpharmacy'])) {
                $this->db = new Database;
                $email = $_POST['acceptpharmacy'];
                $data = [
                    'email' => $email
                ];
                $keys = array_keys($data);
                $query = "SELECT * FROM pharmacyregistration WHERE ";
                $conditions = [];
                foreach ($keys as $key) {
                    $conditions[] = $key . "=:" . $key;
                }
                $query .= implode(' AND ', $conditions) . ' ORDER BY id DESC LIMIT 1';
                $res = $this->db->query2($query, $data);
                $name = $res[0]->name;
                $email = $res[0]->email;
                $password = $res[0]->password;
                $id=$res[0]->id;
                $this->db->query('INSERT INTO users (name, email, password , role, userId) VALUES(:name, :email , :password, :role , :userId)');
                $query2 = "UPDATE pharmacyregistration SET status = 'approved' WHERE email = :email";
                $this->db->query2($query2, $data);
                // Bind values
                $this->db->bind(':name', $name);
                $this->db->bind(':email',  $email);
                $this->db->bind(':password', $password);
                $this->db->bind(':role', 'pharmacy');
                $this->db->bind(':userId', $id);
                // Execute
                if ($this->db->execute()) {
                    $mail = new Mail;
                    $mail->sendConfirmationEmailToPharmacy($email, $name);
                    header('location: ' . URLROOT . '/managers/registration');
                    return true;
                } else {
                    return false;
                }
                header('location: ' . URLROOT . '/managers/registration');
            }
        }
    }

    public function editpassword() {

         
        $getUserData = $this->managerModel->getChangePasswordData();
        $data = [
            'getUserData' => $getUserData,
            'email_err' => '',
            'oldpassword_err' => '',
            'newpassword_err' => ''
        ];

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'getUserData' => $getUserData,
                'oldpassword' => trim($_POST['oldpassword']),
                'newpassword' => trim($_POST['newpassword']),
                'id' => $_SESSION['USER_DATA']['id'],
                'email_err' => '',
                'oldpassword_err' => '',
                'newpassword_err' => ''
            ];
            // Validate data
        
            if (empty($data['oldpassword'])) {
                $data['oldpassword_err'] = '*Please enter old password';
            }
            if (empty($data['newpassword'])) {
                $data['newpassword_err'] = '*Please enter new password';
            }

        
            //check old password is correct
            $getOldpassword=$this->managerModel->checkOldPassword($data['id']);
            if ($getOldpassword->password != $data['oldpassword']) {
                $data['oldpassword_err'] = '*Old password is incorrect';
            }

            //check old password and new password is same
            if ($data['oldpassword'] == $data['newpassword']) {
                $data['newpassword_err'] = '*Old password and new password cannot be same';
            }
           
            // Make sure no errors
            if (empty($data['email_err']) && empty($data['oldpassword_err']) && empty($data['newpassword_err'])) {
                // Validated
                // Register user from model function
                if ($this->managerModel->updatePassword($data)) {
                    // Redirect to login
                    redirect('managers/index');
                    return;
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('manager/editpassword', $data);
            }
            return;
        }
        $this->view('manager/editpassword' ,$data);
    }

    public function sendMessage($id) {
        $getMessageData = $this->managerModel->getMessageDataById($id);
        $getUserData = $this->managerModel->getUserData();

        $data = [
            'getMessageData' => $getMessageData ,
            'getUserData' => $getUserData,
            'message' => '',
            'message_err' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'getMessageData' => $getMessageData ,
                'id' => trim($_POST['id']),
                'pharmacyId' => trim($_POST['pharmacyId']),
                'sender' => trim($_POST['sender']),
                'receiver' => trim($_POST['receiver']),
                'heading' => trim($_POST['heading']),
                'message' => trim($_POST['message']),
                'message_err' => ''
            ];
            // Validate data
            if (empty($data['message'])) {
                $data['message_err'] = '*Please enter message';
            }
            // Make sure no errors
            if (empty($data['message_err'])) {
                // Validated
                // Register user from model function
                if ($this->managerModel->sendMessage($data)) {
                    // Redirect to login
                    redirect('managers/messages');
                    return;
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('manager/sendMessage', $data);
            }
            return;
        }
        $this->view('manager/sendMessage', $data);
        
    }

 
}
