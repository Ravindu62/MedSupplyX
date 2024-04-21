<DOCTYPE html>
<html lang="en">   
<head> 
<title> Inventory </title>
<meta charset="utf-8">
<link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
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
 <a href="<?php echo URLROOT; ?>/pharmacies/addInventory"> <button class="addBtn"> Add Inventory </button> </a>
  </div>
  <div class="anim">
    Inventory 
  </div>
  </h2>

  <form class="search">
  <input type = "text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="pharmacyMedicineSearch()"> 
  <i class="fas fa-search" id="searchicon"></i>
  </form>
  
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

<?php foreach($data['inventory'] as $inventory) : ?>
<tr> 
  <td> <?php echo $inventory->medicine_id; ?> </td>
  <td> <?php echo $inventory->name; ?> </td>
  <td> <?php echo $inventory->batch_no; ?> </td>
  <td> <?php echo $inventory->category_no; ?> </td>
  <td> <?php echo $inventory->quantity; ?> </td>
  <td> <?php echo date('Y-m-d', strtotime($inventory->manu_date)); ?> </td>
  <td> <?php echo date('Y-m-d', strtotime($inventory->expire_date)); ?> </td>
  <td> <?php echo $inventory->unit_amount; ?> </td>
 <td> <form action="<?php echo URLROOT; ?>/pharmacies/editInventory/<?php echo $inventory->id; ?>" method="POST">
    <input type="submit" id="edit" class="smallOpen-button" name="edit" value="Edit"> </td>
    <td> <form action="<?php echo URLROOT; ?>/pharmacies/removeInventory" method="POST">
    <input type="submit" id="remove" class="smallOpen-button" name="remove" value="Remove"> </td>
</form>
</tr>
<?php endforeach; ?>

</table>
</div>
</div>
</div>


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

