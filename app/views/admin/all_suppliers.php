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

<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>


<!-- content -->
  <div class="content">
  
  
  <h2 class="anim"> Suppliers </h2>
  <p class="anim"> Here are all the Suppliers who registered to the MedSupplyX </p>

<div class="anim">    
<table class="customers">
<tr>
    
    <th>  </th>
    <th> Licence No </th>
    <th> Supplier Name </th>
    <th> Physical Address </th>
    <th> Contact No </th>
    <th> Email </th>
    
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  
</tr>

<?php foreach($data['allSuppliers'] as $allSuppliers) : ?>
<tr> 
  <td> </td>
  <td> <?php echo $allSuppliers->licenceno; ?> </td>
  <td> <?php echo $allSuppliers->name; ?> </td>
  <td> <?php echo $allSuppliers->address; ?> </td>
  <td> <?php echo $allSuppliers->phone; ?> </td>
  <td> <?php echo $allSuppliers->email; ?> </td>

  <?php endforeach; ?>
</tr>

</table>
</div>
</div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>




</body>
</html>