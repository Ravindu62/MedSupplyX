<?php
 class pharmacy extends Controller {
    public function index() {
        $data = [];
        
        $this->view('pharmacy/index', $data);
    }

    public function inventory() {
        $data = [];
        
        $this->view('pharmacy/inventory', $data);
    }

    public function messages() {
        $data = [];
        
        $this->view('pharmacy/messages', $data);
    }

    public function advertistments() {
        $data = [];
        
        $this->view('pharmacy/advertistments', $data);
    }

    public function orders() {
        $data = [];
        
        $this->view('pharmacy/orders', $data);
    }

    public function history() {
        $data = [];
        
        $this->view('pharmacy/history', $data);
    }

    public function profile() {
        $data = [];
        
        $this->view('pharmacy/profile', $data);
    }

    public function new_order() {
        $data = [];
        
        $this->view('pharmacy/new_order', $data);
    }



}
