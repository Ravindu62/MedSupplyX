<?php
class Managers extends Controller {
    public $managerModel;
    public $userModel;
    public $db;

    public function __construct() {
        $this->managerModel = $this->model('Manager');
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

public function registration() {

    $pharmacyRegistration = $this->managerModel->getPharmacyRegistration();
    $supplierRegistration = $this->managerModel->getSupplierRegistration();

    $data = [
        'pharmacyRegistration' => $pharmacyRegistration ,
        'supplierRegistration' => $supplierRegistration
    ];


    
    $this->view('manager/registration', $data);
}



public function rejectPharmacy($id) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get existing post from model
        $pharmacyRegistration = $this->managerModel->getPharmacyById($id);

        // Check for owner
        if($pharmacyRegistration->pharmacyname != $_SESSION['USER_DATA']['name']) {
            redirect('managers/registration');
        }

        if($this->managerModel->rejectPharmacy($id)) {
            redirect('managers/registration');
        } else {
            die('Something went wrong');
        }
    } else {
        redirect('managers/registration');
    }
}
 

public function rejectSupplier($id) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get existing post from model
        $supplierRegistration = $this->managerModel->getsupplierById($id);

        // Check for owner
        if($supplierRegistration->supppliername != $_SESSION['USER_DATA']['name']) {
            redirect('managers/registration');
        }

        if($this->managerModel->rejectSupplier($id)) {
            redirect('managers/registration');
        } else {
            die('Something went wrong');
        }
    } else {
        redirect('managers/registration');
    }
}



public function all_pharmacies() {

    $allPharmacies = $this->managerModel->getApprovedPharmacyRegistration();
        
    $data = [
        'allPharmacies' => $allPharmacies
    ];
    
    $this->view('manager/all_pharmacies', $data);

}

public function all_suppliers() {

    $allSuppliers = $this->managerModel->getApprovedSupplierRegistration();
    $data = [
        'allSuppliers' => $allSuppliers
    ];
    
    $this->view('manager/all_suppliers', $data);

}

public function medicines() {
    $getMedicines = $this->managerModel->getMedicines();
    $data = [
        'getMedicines' => $getMedicines
    ];
    
    
    $this->view('manager/medicines', $data);

}

 public function new_medicine() {

    // Check for POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            'mname_err' => '',
            'refno_err' => '',
            'category_err' => '',
            'volume_err' => '',
            'medicineType_err' => ''
        ];

        // Validate data
        if(empty($data['mname'])){
            $data['mname_err'] = 'Please enter medicine name';
        }

        if(empty($data['refno'])){
            $data['refno_err'] = 'Please enter reference number';
        }

        if(empty($data['category'])){
            $data['category_err'] = 'Please enter category';
        }

        if(empty($data['volume'])){
            $data['volume_err'] = 'Please enter volume';
        }

        if(empty($data['medicineType'])){
            $data['medicineType_err'] = 'Please enter medicine type';
        }

        // Make sure no errors
        if(empty($data['mname_err']) && empty($data['refno_err']) && empty($data['category_err']) && empty($data['volume_err']) && empty($data['medicineType_err'])){
            // Validated

            // Register user from model function
            if($this->managerModel->addMedicine($data)) {
                // Redirect to login
                redirect('managers/medicines');
            } else {
                die('Something went wrong');
            }

        } else {
            // Load view with errors
            $this->view('manager/new_medicine', $data);
        }

    } else {
        // Init data
        $data = [
            'mname' => '',
            'refno' => '',
            'category' => '',
            'volume' => '',
            'medicineType' => '',
            'description' => '',
            'mname_err' => '',
            'refno_err' => '',
            'category_err' => '',
            'volume_err' => '',
            'medicineType_err' => ''
        ];

        // Load view 
        $this->view('manager/new_medicine', $data);

}
}



public function messages() {
    $data = [];
    
    $this->view('manager/messages', $data);

}




public function profile() {

    $getUserData = $this->managerModel->getUserData();

    $data = [
        'getUserData' => $getUserData
    ];
    
    $this->view('manager/profile', $data);

}

public function editprofile() {

    $getUserData = $this->managerModel->getUserData();
    
    $data=[
        'getUserData' => $getUserData
    ];
    $this->view('manager/editprofile', $data);
}



public function logout() {
    unset($_SESSION['USER_DATA']);
    redirect('users/login');
 }

public function approve_supplier() {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['acceptsupplier'])){
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

        $this->db->query('INSERT INTO users (name, email, password , role) VALUES(:name, :email , :password, :role)');

        $query2 = "UPDATE supplierregistration SET status = 'approved' WHERE email = :email";
        $this->db->query2($query2, $data);

    
 
        // Bind values
        
        $this->db->bind(':name',$name);
        $this->db->bind(':email',  $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':role', 'supplier');

        // Execute
        if($this->db->execute()) {
            header('location: ' . URLROOT . '/managers/registration');

            return true;
        } else {
            return false;
        }
        
        header('location: ' . URLROOT . '/managers/registration');
       
    
        }
    }
    
}

public function approve_pharmacy() {

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['acceptpharmacy'])){
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

        $this->db->query('INSERT INTO users (name, email, password , role) VALUES(:name, :email , :password, :role)');



        $query2 = "UPDATE pharmacyregistration SET status = 'approved' WHERE email = :email";
        $this->db->query2($query2, $data);

 
        // Bind values
        
        $this->db->bind(':name',$name);
        $this->db->bind(':email',  $email);
        $this->db->bind(':password', $password);
        $this->db->bind(':role', 'pharmacy');

        // Execute
        if($this->db->execute()) {
            header('location: ' . URLROOT . '/managers/registration');

            return true;
        } else {
            return false;
        }
        
        header('location: ' . URLROOT . '/managers/registration');
       
    
        }
    }
        
}
}

