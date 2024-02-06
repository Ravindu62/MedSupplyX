<!DOCTYPE html>
<html lang="en">
<head>
<title> Order requests </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>

<!-- content -->
  <div class="content">
  <div class="anim">
    <h2> Order Requests </h2>
  </div>

  <div class="anim">
<form class="search">
  <input type = "text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()"> 
  <i class="fas fa-search" id="searchicon"></i>
  </form>


<table class="customers" id="myTable">
  <tr>
  
   
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Delivery Date </th>
    <th> Ordered Date </th>
    <th> Accept / Reject </th>
    
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>

  
  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> accept </button> -->  </td>
</tr>

<?php foreach($data['order'] as $order) : ?>
<tr> 
  <td> <?php echo $order->medicine; ?> </td>
  <td> <?php echo $order->batchno; ?> </td>
  <td> <?php echo $order->quantity; ?> </td>
  <td> <?php echo $order->deliveryDate; ?> </td>
  <td> <?php echo $order->orderEndDate; ?> </td>
  <td> <a href="#popup1"><button class="smallOpen-button"> Accept </button></a>
       <button class="smallOpen-button" onclick=""> Reject </button> </td>
</tr>
<?php endforeach; ?>






</table>
</div>

<div class="space"></div>

<div class="anim">  <h2> Approved Orders (By You) </h2> </div> 

<div class="anim">  
<table class="customers">
  <tr>
    <th>  </th>

    <th> Pharmacy Name </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Delivery Date </th>
    <th> Price (LKR) </th>
    <th> Change / Remove </th>
  
   
    
    
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

<div class="anim">  <h2> Accepted Orders (By Pharmacy) </h2> </div> 

<div class="anim">  
<table class="customers">
  <tr>
    <th>  </th>
    <th> Medicine Name </th>
    <th> Pharmacy Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Order End Date </th>
    <th> Price (LKR) </th>
   
    
    
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
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>

  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> accept </button> -->  </td>
</tr>
</table>
</div>






<div id="popup1" class="overlay">
	<div class="popup">
  <form action="<?php echo URLROOT; ?>/suppliers/orders" method="POST" class="form-container">
    

    <label for="text"><b> Your Price ? (Rs.)</b></label>
    <input class="bar" type="text" placeholder="Enter Your Price" name="price" required>
    <br> <br>

    <button type="submit" class="btn"> Approve </button>
    <a href="#"> <button type="button" class="btn cancel"> Close </button>
  </form>
	</div>
</div>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>

