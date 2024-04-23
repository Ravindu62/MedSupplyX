<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">

  <script src="https://kit.fontawesome.com/b01c051a0f.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <title> </title>
</head>

<body>

  <header>
    <div class="navbar">
      <div class="leftarea">
        <table>
          <tr>
            <td> <img class="logo" src="<?php echo URLROOT ?>/public/img/logo3.png" alt="logo"> </td>
            <td>
              <div class="txt_green"> MedSupplyX </div>
            </td>
          </tr>
        </table>
      </div>
      <div class="greeting">  
      Hello, <?php echo $_SESSION['USER_DATA']['name']; ?>
      <?php if ($_SESSION['USER_DATA']['role'] === 'admin') : ?>
                <a href="<?php echo URLROOT; ?>/admins/profile"><img class="profile" src="<?php echo URLROOT ?>/public/img/profile.png" alt="profile"></a>
            <?php elseif ($_SESSION['USER_DATA']['role'] === 'pharmacy') : ?>
                <a href="<?php echo URLROOT; ?>/pharmacies/profile/profile"><img class="profile" src="<?php echo URLROOT ?>/public/img/profile.png" alt="profile"></a>
            <?php elseif ($_SESSION['USER_DATA']['role'] === 'supplier') : ?>
                <a href="<?php echo URLROOT; ?>/suppliers/profile"><img class="profile" src="<?php echo URLROOT ?>/public/img/profile.png" alt="profile"></a>
            <?php elseif ($_SESSION['USER_DATA']['role'] === 'manager') : ?>
                <a href="<?php echo URLROOT; ?>/managers/profile"><img class="profile" src="<?php echo URLROOT ?>/public/img/profile.png" alt="profile"></a>
            <?php endif; ?>
      
      </div>
    </div>


  </header>