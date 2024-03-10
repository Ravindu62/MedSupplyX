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
      <a href="<?php echo URLROOT ?>/pharmacies" class="navbar_section">
      <i class="fa-solid fa-gauge"></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/pharmacies/inventory" class="navbar_section">
    <i class="fa-solid fa-warehouse"></i>
        <span class="text">Inventory</span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/pharmacies/messages" class="navbar_section">
    <i class="fa-solid fa-envelope"></i>
        <span class="text"> Notifications</span>
      </a>
    </li>
    <a href="<?php echo URLROOT ?>/pharmacies/advertistments" class="navbar_section">
    <i class="fa-solid fa-rectangle-ad"></i>
        <span class="text"> Advertistments </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/pharmacies/orders" class="navbar_section">
    <i class="fa-solid fa-cart-shopping"></i>
        <span class="text"> Supplier Orders </span>
      </a>
    </li>

    <li>
    <a href="<?php echo URLROOT ?>/pharmacies/customerOrders" class="navbar_section">
    <i class="fa-solid fa-cart-shopping"></i>
        <span class="text"> Cust. Orders </span>
      </a>
    </li>

    <li>
    <a href="<?php echo URLROOT ?>/pharmacies/history" class="navbar_section">
    <i class="fa-solid fa-clock-rotate-left"></i>
        <span class="text"> History </span>
      </a>
    </li>
    <li>
      <a href="<?php echo URLROOT ?>/pharmacies/profile" class="navbar_section">
      <i class="fa-solid fa-user"></i>
        <span class="text"> Profile  </span>
      </a>
      </li>
    <li>
      <a href="<?php echo URLROOT ?>/users/logout" class="navbar_section">
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
 
