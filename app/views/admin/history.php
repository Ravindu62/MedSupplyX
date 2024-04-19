<!DOCTYPE html>
<html lang="en">
<head>
<title> History </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>
<!-- content -->
  <div class="content">
  <div class="anim">  <h2> Delivered orders </h2> </div> 
<div class="anim">  
<table class="customers">
  <tr>
    <th> </th>
    <th> Pharmacy Name </th>
    <th> Supplier Name </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Ordered Date </th>
    <th> Delivered Date </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>
</table>
</div>
<div class="space"></div>
<div class="anim">  <h2> Cancelled orders by pharmacies </h2> </div>
<div class="anim">  
<table class="customers">
  <tr>
    <th> </th>
    <th> Pharmacy Name </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Ordered Date </th>
    <th> Reason </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>
</table>
</div>
<div class="space"></div>
<div class="anim">  <h2> Rejected orders by Suppliers </h2> </div>
<div class="anim">  
<table class="customers">
  <tr>
    <th> </th>
    <th> Pharmacy Name </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Ordered Date </th>
    <th> Delivered Date </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>
</table>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
