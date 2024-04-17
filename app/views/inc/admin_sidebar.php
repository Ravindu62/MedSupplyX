<!DOCTYPE html>
<html lang="en">
<head>
<title>  </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/b01c051a0f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./styles/style.css">

</head>
<body>
  
<div class="main">
  <!-- sidebar -->
  <div class="sidebar">
    <div class="space"></div>

  <div class="nav-container">
  <ul class="nav">
    <li class="active">
      <a href="<?php echo URLROOT ?>/admins/index" class="navbar_section">
      <i class="fa-solid fa-gauge"></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/admins/managerRegistration" class="navbar_section">
    <i class="fa-solid fa-user-plus"></i>
        <span class="text">Reg Managers</span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/admins/managers" class="navbar_section">
    <i class="fa-solid fa-people-roof"></i>
        <span class="text">Managers </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/admins/all_pharmacies" class="navbar_section">
    <i class="fa-solid fa-users"></i>
        <span class="text">Users </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/admins/messages" class="navbar_section">
    <i class="fa-solid fa-envelope"></i>
        <span class="text">Messages </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/admins/all_orders" class="navbar_section">
    <i class="fa-solid fa-cart-shopping"></i>
        <span class="text"> All Orders </span>
      </a>
    </li>
    <li>
      <a href="<?php echo URLROOT ?>/admins/profile" class="navbar_section">
      <i class="fa-solid fa-user"></i>
        <span class="text"> Profile  </span>
      </a>
      </li>
    <li>
      <a href="<?php echo URLROOT ?>/admins/logout" class="navbar_section">
      <i class="fa-solid fa-right-from-bracket"></i>
        <span class="text"> Logout </span>
      </a>
    </li>
  </ul>
</div>

<script>
  
  $('li').click(function(){
  $(this).addClass('active').siblings().removeClass('active');
});
</script>
         
     
  </div>
 



