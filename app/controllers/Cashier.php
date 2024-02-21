<?php
 class Cashier extends Controller {
    public function index() {
        $data = [];
        
        $this->view('cashier/index', $data);
    }

    public function history() {
        $data = [];
        
        $this->view('cashier/history', $data);
    }

    public function profile() {
        $data = [];
        
        $this->view('cashier/profile', $data);
    }

    public function inventory() {
        $data = [];
        
        $this->view('cashier/inventory', $data);
    }

    public function messages() {
        $data = [];
        
        $this->view('cashier/messages', $data);
    }

    public function orders() {
        $data = [];
        
        $this->view('cashier/orders', $data);
    }

    public function logout() {
        unset($_SESSION['USER_DATA']);
        redirect('users/login');
     }

}
