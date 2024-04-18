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

<div class="horizontaltab2">
  <button class="tablinks active" onclick="openEvent(event, 'pharmacy')">Pharmacy Registration </button>
  <button class="tablinks" onclick="openEvent(event, 'supplier')">Supplier Registration </button>
</div>
  
<div id="pharmacy" class="tabcontent">
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
    <th> Licence </th>
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
  <td> <a href="<?php echo URLROOT; ?>/public/uploads/PharmacyLicence/<?php echo $pharmacyRegistration->licence; ?>" target="_blank">
          <i class="fa fa-file-pdf-o" style="font-size:24px;color:red;"></i> 
       </a> 
  </td>
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
</div>

<div id="supplier" class="tabcontent">
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
  <td> <a href="<?php echo URLROOT; ?>/public/uploads/SupplierLicence/<?php echo $supplierRegistration->licence; ?>" target="_blank">
          <i class="fa fa-file-pdf-o" style="font-size:24px;color:red;"></i> 
       </a> 
  </td>
  <td> <button class="smallOpen-button" name="acceptsupplier" value="<?php echo $supplierRegistration->email?>"> Accept </button>  </td>
</form>
  <td> <form action="<?php echo URLROOT;?>/managers/rejectSupplier/<?php echo $supplierRegistration->id; ?>" method="POST">
        <input type="submit" class="smallOpen-button-red" name="reject" value="Reject">    
      </form> 
  </td>
</tr>
<?php endforeach; ?>




</table>
</div>
</div>
</div>
</div>


<script>
  function openEvent(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  if(evt) evt.currentTarget.className += " active";
    else document.querySelector('button.tablinks').className += " active";
}
document.body.addEventListener('DOMContentLoaded', openEvent(event, 'pharmacy'));


</script>


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

