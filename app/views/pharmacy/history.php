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

<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

<!-- content -->
  <div class="content">

  <div class="anim">  <h2> Delivered Orders </h2> </div> 

<div class="anim">  
<table class="customers">
  <tr>
    <th class="custom1"> </th>
    <th class="custom1"> Medicine Name </th>
    <th class="custom1"> Batch No </th>
    <th class="custom1"> Quantity </th>
    <th class="custom1"> Ordered Date </th>
    <th class="custom1"> Delivered Date </th>
    <th class="custom1"> Supplier Name </th>
    <th class="custom1"> Price (LKR) </th>
   
    
    
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

<tr> 
  <td> 01</td>
  <td> Panadol </td>
  <td> 1231</td>
  <td> 200</td>
  <td> 2023/09/05</td>
  <td> 2023/09/05 </td>
  <td> ABC (pvt) Ltd </td>
  <td> 10 000/= </td>
 
</tr>
</table>
</div>



<div class="space"></div>
<div class="anim">  
<h2> Cancelled Orders (By You!) </h2>
</div>
<div class="anim">   
<table class="customers">
  <tr>
    <th class="custom3"> </th>
    <th class="custom3"> Medicine Name </th>
    <th class="custom3"> Pharmacy Name </th>
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
  <td> </td>
</tr>

<tr> 
  <td> 01</td>
  <td> Panadol </td>
  <td> 1231</td>
  <td> 1232</td>
  <td> 200 </td>
  <td> i received another panadol order.</td>

 
</tr>

</table>
</div>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>

