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
      <a href="<?php echo URLROOT ?>/managers" class="navbar_section">
      <i class="fa-solid fa-gauge"></i>
        <span class="text">Dashboard</span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/managers/registration" class="navbar_section">
    <i class="fa-regular fa-address-card"></i>
        <span class="text">Registration</span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/managers/all_pharmacies" class="navbar_section">
    <i class="fa-solid fa-prescription-bottle-medical"></i>
        <span class="text">Pharmacies </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/managers/all_suppliers" class="navbar_section">
    <i class="fa-solid fa-truck-ramp-box"></i>
        <span class="text">Suppliers </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/managers/medicines" class="navbar_section">
    <i class="fa-solid fa-capsules"></i>
        <span class="text"> Medicines </span>
      </a>
    </li>
    <li>
    <a href="<?php echo URLROOT ?>/managers/messages" class="navbar_section">
    <i class="fa-solid fa-envelope"></i>
        <span class="text">Messages</span>
      </a>
    </li>
    <li>
      <a href="<?php echo URLROOT ?>/managers/profile" class="navbar_section">
      <i class="fa-solid fa-user"></i>
        <span class="text"> Profile  </span>
      </a>
      </li>
    <li>
      <a href="<?php echo URLROOT ?>/managers/logout" class="navbar_section">
      <i class="fa-solid fa-right-from-bracket"></i>
        <span class="text"> Logout </span>
      </a>
    </li>
  </ul>
  </div></div>
<script>
  $('li').click(function(){
  $(this).addClass('active').siblings().removeClass('active');
});
</script>
</body>
</html>
