<?php
class Pages extends Controller{
    public function __construct(){
      
   
}

public function index(){
    $this->view('pages/index'); 

    $data = [
        'title' => 'Welcome'
    ];

}

public function about(){
    $this->view('pages/about');

    $data = [
        'title' => 'About Us'
    ];
}




}
?>