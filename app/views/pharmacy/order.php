<!DOCTYPE html>
<html lang="en">
<head>
<title> Requset an Order </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

<!-- content -->
  <div class="content">

  <div class="smallspace"></div>
  
  <div class="alignRight">
 <a href="<?php echo URLROOT ?>/pharmacy/new_order"> <button class="addBtn"> + New Order </button> </a>
  </div> 
  
  <div class="anim">
    <h2> Your Orders </h2>
  </div>
 


<div class="anim">
<table class="customers">
  <tr>
    <th>  </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Ordered Date </th>
    <th> Delivery Date </th>
    <th> Suppliers </th>
    <th> Change / Delete</th>
   
    
  </tr>
<tr> 
 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> accept </button> -->  </td>
</tr>

<?php foreach($data['order'] as $order) : ?>
<tr> 
  <td> </td>
  <td> <?php echo $order->medicine; ?> </td>
  <td> <?php echo $order->batchno; ?> </td>
  <td> <?php echo $order->quantity; ?> </td>
  <td> <?php echo $order->createdAt; ?> </td>
  <td> <?php echo $order->orderEndDate; ?> </td>
  <td> <?php echo $order->deliveryDate; ?> </td>
  <td> <button class="smallOpen-button"> Change </button> </td>   

 <td> <form action="<?php echo URLROOT; ?>/pharmacies/deleteOrder/<?php echo $order->id; ?>" method="POST">
    <input type="submit" id="delete" class="smallOpen-button" name="delete" value="Delete"> </td>
</form>
</tr>
<?php endforeach; ?>
</table>
</div>

<div class="space"></div>

<div class="anim">  <h2> Accepted Orders (By Supplier) </h2> </div> 

<div class="anim">  
<table class="customers">
  <tr>
    <th>  </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Ordered Date </th>
    <th> Delivery Date </th>
    <th> Supplier </th>
    <th> Supplier Price (LKR) </th>
    <th> Accept / Reject </th>
    
    
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
  <td> </td>
 
</tr>
</table>
</div>

<div class="space"></div>

<div class="anim">  <h2> Selected Orders (By You) </h2> </div> 

<div class="anim">  
<table class="customers">
  <tr>
    <th>  </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Ordered Date </th>
    <th> Delivery Date </th>
    <th> Supplier</th>
    <th> Price (LKR) </th>
    <th> Delivered </th>
   
    
    
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
  <td> </td>
 
</tr>
</table>
</div>


<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    

    <label for="text"><b> Your Price ? </b></label>
    <input class="bar" type="text" placeholder="Enter Your Price for the order" name="price" required>
    <br> <br>

    <button type="submit" class="btn"> Send </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Close </button>
  </form>
</div>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>

