<?php
 class Auth {
    public static function authenticate($row){
        if(is_object($row)){
            $_SESSION['USER_DATA'] = [
                'id' => $row->id,
                'name' => $row->name,
                'email' => $row->email,
                'role' => $row->role,
                'created_at' => $row->date,
            ];
        }
    }
    public static function is_logged_in(){
        if(!empty($_SESSION['USER_DATA'])){
            return true;
        }
        return false;   
    }
    public static function logout(){
       if(!empty($_SESSION['USER_DATA'])){
           unset($_SESSION['USER_DATA']);
           session_unset();
           session_regenerate_id();
       }
    }
    public static function is_admin(){
        if($_SESSION['USER_DATA']['role'] == 'admin'){
            return true;
        }
        return false;
    }
    public static function is_manager(){
        if($_SESSION['USER_DATA']['role'] == 'manager'){
            return true;
        }
        return false;
    }
    public static function is_pharmacy(){
        if($_SESSION['USER_DATA']['role'] == 'pharmacy'){
            return true;
        }
        return false;
    }
    public static function is_supplier(){
        if($_SESSION['USER_DATA']['role'] == 'supplier'){
            return true;
        }
        return false;
    }
    public static function is_cashier(){
        if($_SESSION['USER_DATA']['role'] == 'cashier'){
            return true;
        }
        return false;
    }
 }