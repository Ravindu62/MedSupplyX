<!DOCTYPE html>
<html lang="en">

<head>
  <title> Customer Orders </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
  <!-- get the customer id as a hidden input -->
  <input type="hidden" id="customerId" value="<?php echo $data['customerId']; ?>">
<!-- content -->
<div class="content">
  <h2>
    <br>
  <div class="alignRight">
 <a href="<?php echo URLROOT; ?>/pharmacies/addInventory"> <button class="addBtn"> Add Medicine </button> </a>
  </div>
  <div class="smallspace"></div>
  <div class="anim">
    Medicine Order for Customer 
  </div>
  </h2>
  
<br>
<div class="anim">    
<table class="customers" id="myTable">
  <tr>
    <th> Medicine ID </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Category </th>
    <th> Quantity </th>
    <th> Manufacture Date </th>
    <th> Expire Date </th>
    <th> Unit Price</th>
    <th> Update</th>
    <th> Remove</th>
    
    
  </tr>

</table>
</div>
</div>
</div>


  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>

