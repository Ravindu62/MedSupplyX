<!DOCTYPE html>
<html lang="en">   
<head> 
<title> Inventory </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
<!-- content -->
<div class="content">

<h2>
<div class="anim">
These are the medicines that are about to expire.
</div>
</h2>

<table>
  <tr>
     <td> <div class="red-rectangle"></div> </td>
     <td>  <div class="importantMessage"> Expired Medicines </div></td>
   
    </tr>
  </table>

<div class="anim">    
<table class="customers" id="myTable">

<tr>

<th> Medicine Name </th>
<th> Brand </th>
<th> Category </th>
<th> Quantity</th>
<th> Manufactured Date</th>
<th> Expiry Date </th>


</tr>
<tr> 
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>


</tr>

<?php foreach ($data['expiredmedicines'] as $inventory) : ?>

<tr> 
<td> <?php echo $inventory->medicineName ?> 
   <?php echo $inventory->volume ?> 
   <?php echo $inventory->type ?> </td>
<td> <?php echo $inventory->brand ?> </td>
<td> <?php echo $inventory->category ?> </td>
<td> <?php echo $inventory->quantity ?> </td>
<td> <?php echo $inventory->manufactureDate ?> </td>
<td> <?php echo $inventory->expireDate ?> </td>


</tr>
<?php endforeach; ?>
</table>

</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
// JavaScript to color expired medicine rows red
document.addEventListener('DOMContentLoaded', function() {
  var tableRows = document.querySelectorAll('.customers tr:not(:first-child)');

  tableRows.forEach(function(row) {
    var expiryDate = new Date(row.cells[5].textContent);
    var today = new Date();
    today.setHours(0, 0, 0, 0); // Set hours, minutes, seconds, and milliseconds to 0 for comparison

    if (expiryDate < today) {
      row.style.backgroundColor = '#ffcccc'; // Change background color to red
    }
  });
});
</script>
</body>
</html>
