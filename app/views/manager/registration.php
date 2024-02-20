<DOCTYPE html>
<html lang="en">   
<head> 
<title> Registration </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>


<!-- content -->
  <div class="content">
  
  
  <h2 class="anim"> Pharmacies </h2>
  <p class="anim"> Here are all the Pharmacies who want to register to the MedSupplyX </p>

  <div class="anim">    
  <form  method="post" action="<?php echo URLROOT;?>/managers/approve_pharmacy">
<table class="customers">
<tr>
    
    <th>  </th>
    <th> Licence No </th>
    <th> Pharmacy Name </th>
    <th> Physical Address </th>
    <th> Contact No </th>
    <th> Email </th>
    <th colspan="2"> Accept / Reject </th>
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

<?php foreach($data['pharmacyRegistration'] as $pharmacyRegistration) : ?>
<tr> 
  <td> </td>
  <td> <?php echo $pharmacyRegistration->licenceno; ?> </td>
  <td> <?php echo $pharmacyRegistration->name; ?> </td>
  <td> <?php echo $pharmacyRegistration->address; ?> </td>
  <td> <?php echo $pharmacyRegistration->phone; ?> </td>
  <td> <?php echo $pharmacyRegistration->email; ?> </td>
  <td> <button class="smallOpen-button" name="acceptpharmacy" value="<?php echo $pharmacyRegistration->email?>"> Accept </button> </form></td>

  <td> <form action="<?php echo URLROOT;?>/managers/rejectPharmacy/<?php echo $pharmacyRegistration->id; ?>" method="POST">
        <input type="submit" class="smallOpen-button-red" name="reject" value="Reject">    
      </form> 
  </td>


</tr>

<?php endforeach; ?>

</table>
</div>
</form>

<div class="space"></div> 
<h2 class="anim"> Suppliers </h2>
  <p class="anim"> Here are all the Suppliers who want to register to the MedSupplyX </p>

<div class="anim">    
  <form  method="post" action="<?php echo URLROOT;?>/managers/approve_supplier">
<table class="customers">
<tr>
    
    <th>  </th>
    <th> Licence No </th>
    <th> Supplier Name </th>
    <th> Physical Address </th>
    <th> Contact No </th>
    <th> Email </th>
    <th> Accept / Reject </th>
  </tr>
<tr> 
 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>

  <td> <!-- <button> Accept </button> --> </td>
</tr>

<?php foreach($data['supplierRegistration'] as $supplierRegistration) : ?>
<tr> 
  <td> </td>
  <td> <?php echo $supplierRegistration->licenceno; ?> </td>
  <td> <?php echo $supplierRegistration->name; ?> </td>
  <td> <?php echo $supplierRegistration->address; ?> </td>
  <td> <?php echo $supplierRegistration->phone; ?> </td>
  <td> <?php echo $supplierRegistration->email; ?> </td>
  <td> <button class="smallOpen-button" name="acceptsupplier" value="<?php echo $supplierRegistration->email?>"> Accept </button> 
  <button class="smallOpen-button-red"> Reject </button> </td>
</tr>
<?php endforeach; ?>




</table>
</form>
</div>

</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

<!-- 
<div id="popup1" class="overlay">
	<div class="popup">
  <form class="form-container">
    

    <label for="text"> Do you want to register ?  </label>
    
    <br> <br>

   <a href="<?php echo URLROOT . '/managers/approvePharmacy/' . $pharmacyRegistration->id ;?>"><button type="button" class="smallOpen-button"> Yes </button></a>
   <a href="#"> <button type="button" class="smallOpen-button"> No </button>  </a>
  </form>
	</div>
</div>

<div id="popup2" class="overlay">
  <div class="popup">
  <form class="form-container">
    

    <label for="text"> Do you want to reject ?  </label>
    
    <br> <br>

   <a href ="<?php echo URLROOT . '/managers/rejectPharmacy/' . $pharmacyRegistration->id ;?>"> <button type="button" class="smallOpen-button"> Yes </button> </a>
   <a href="#"> <button type="button" class="smallOpen-button"> No </button>   </a>
  </form>
  </div>



</body>
</html> -->

