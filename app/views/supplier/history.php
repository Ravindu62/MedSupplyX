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
<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
<!-- content -->
  <div class="content">
  <div class="anim">  <h2> Delivered Orders </h2> </div> 
<div class="anim">  
<table class="customers">
  <tr>
    <th class="custom1"> </th>
    <th class="custom1"> Pharmacy Name </th>
    <th class="custom1"> Medicine Name </th>
    <th class="custom1"> Batch No </th>
    <th class="custom1"> Quantity </th>
    <th class="custom1"> Ordered Date </th>
    <th class="custom1"> Delivered Date </th>
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
<tr> 
  <td> </td>
  <td> Gagana Pharmacy </td>
  <td> Erithropoityne </td>
  <td> 99322</td>
  <td> 1650</td>
  <td> 2023/09/02</td>
  <td> 2023/09/15 </td>
</tr>
</table>
</div>
<div class="space"></div>
<div class="anim">   
<h2> Rejected Orders </h2>
</div>
<div class="anim">
<table class="customers">
  <tr>
    <th class="custom2"> </th>
    <th class="custom2"> Pharmacy Name </th>
    <th class="custom2"> Medicine Name </th>
    <th class="custom2"> Batch No </th>
    <th class="custom2"> Quantity </th>
    <th class="custom2"> Ordered Date </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>
<tr> 
  <td> </td>
  <td> Gagana Pharmacy </td>
  <td> Erithropoityne </td>
  <td> 99322</td>
  <td> 1650</td>
  <td> 2023/09/15 </td>
</tr>
</table>
</div>
<div class="space"></div>
<div class="anim">  
<h2> Cancelled Orders (By Pharmacies) </h2>
</div>
<div class="anim">   
<table class="customers">
  <tr>
    <th class="custom3"> </th>
    <th class="custom3"> Pharmacy Name </th>
    <th class="custom3"> Medicine Name </th>
    <th class="custom3"> Batch No </th>
    <th class="custom3"> Quantity </th>
    <th class="custom3"> Reason for cancelling </th>
    </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
</tr>
<tr> 
  <td> </td>
  <td> Suhada Pharmacy </td>
  <td> Erithropoityne </td>
  <td> 99322</td>
  <td> 1650</td>
  <td> I received donation of Erithropoityne </td>
</tr>
</table>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
