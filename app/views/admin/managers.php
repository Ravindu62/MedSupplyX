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
  
  
  <h2 class="anim"> Managers</h2>
  <p class="anim"> Here are all the Managers who registered to the MedSupplyX </p>

<div class="anim">    
<table class="customers">
  <tr>
    
    <th>  </th>
    <th> Manager Name </th>
    <th> Physical Address </th>
    <th> Contact No </th>
    <th> Email </th>
    <th> Action </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td> 
  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> Update </button> --> </td>
</tr>



<?php foreach($data['managers'] as $manager) : ?>
<tr> 
  <td>  </td>
  <td> <?php echo $manager->name; ?> </td>
  <td> <?php echo $manager->address; ?> </td>
  <td> <?php echo $manager->phone; ?> </td>
  <td> <?php echo $manager->email; ?> </td>
  
  
  <td> <button class="smallOpen-button"> Change </button> <button class="smallOpen-button"> Delete </button></td>   


</tr>
<?php endforeach; ?>
</table>
</div>
</div>
</div>
</div>

</body>
</html>

