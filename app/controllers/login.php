<?php
class Login extends Controller
{       
    public function index(){
        $row = [];
        $data['title'] = 'Login';
        $user = $this->model('User');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $row = $user->first([
                'email' => $_POST['email']
            ]);   
            if($row){
                if($_POST['password'] == $row->password) {
                    echo 'true';
                    Auth::authenticate($row);
                  if(Auth::is_admin()){
                    header('location: ' . URLROOT . '/admins/index');
                    }elseif(Auth::is_manager()){
                        header('location: ' . URLROOT . '/managers/index');
                    }elseif(Auth::is_pharmacy()){
                        header('location: ' . URLROOT . '/pharmacies/index');
                    }elseif(Auth::is_supplier()){
                        header('location: ' . URLROOT . '/suppliers/index');
                    }elseif(Auth::is_cashier()){
                        header('location: ' . URLROOT . '/cashiers/index');
                    }
                }   
                else{
                    $data['errors']['err'] = '*Wrong Email or Password';
                }
            }else{
                $data['errors']['err'] = '*Your Company is not registered yet.';
            }
        }
        $this->view('users/login', $data);
}
}
