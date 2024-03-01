<DOCTYPE html>
<html lang="en">   
<head> 
<title> Inventory </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>


<!-- content -->
  <div class="content">
  <h2>
    <br>
  <div class="alignRight">
 <a href="<?php echo URLROOT; ?>/pharmacies/newInventory"> <button class="addBtn"> Add Inventory </button> </a>
  </div>
  <div class="anim">
    Inventory 
  </div>
  </h2>
<br>
<div class="anim">    
<table class="customers">
  <tr>
    <th> Medicine ID </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Category </th>
    <th> Quantity </th>
    <th> Manufacture Date </th>
    <th> Expire Date </th>
    <th> Unit Price</th>
    <th> Change / Delete</th>
    
    
  </tr>

<?php foreach($data['inventory'] as $inventory) : ?>
<tr> 
  <td> <?php echo $inventory->medicine_id; ?> </td>
  <td> <?php echo $inventory->name; ?> </td>
  <td> <?php echo $inventory->batch_no; ?> </td>
  <td> <?php echo $inventory->category_no; ?> </td>
  <td> <?php echo $inventory->quantity; ?> </td>
  <td> <?php echo $inventory->manu_date; ?> </td>
  <td> <?php echo $inventory->expire_date; ?> </td>
  <td> <?php echo $inventory->unit_amount; ?> </td>
 <td> <form action="<?php echo URLROOT; ?>/pharmacies/deleteOrder/<?php echo $inventory->id; ?>" method="POST">
    <input type="submit" id="delete" class="smallOpen-button" name="edit" value="Edit"> </td>
</form>
</tr>
<?php endforeach; ?>

</table>
</div>
</div>
</div>

<!-- <div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    

    <label for="text"><b> Number of Item </b></label>
    <input class="bar" type="text" placeholder="Enter Your Price for the order" name="price" required>
    <br> <br>

    <button type="submit" class="btn"> Update </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Close </button>
  </form>
</div> -->


<?php require APPROOT . '/views/inc/footer.php'; ?>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


</body>
</html>

