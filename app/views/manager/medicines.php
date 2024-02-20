<!DOCTYPE html>
<html lang="en">
<head>
<title> Medicine Registration </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>

<!-- content -->
  <div class="content">
  <div class="alignRight">
 <a href="<?php echo URLROOT ?>/managers/new_medicine"> <button class="addBtn2"> + New Medicine </button> </a>
  </div> 
 
  <div class="anim">
    <h2> Registered Medicines </h2>
  </div>
 

  <div class="smallspace"></div>
  <div class="smallspace"></div>
  <div class="smallspace"></div>

<div class="anim">
<table class="customers">
  <tr>
    <th>  </th>
    <th> Medicine Name </th>
    <th> Reference No </th>
    <th> Category </th>
    <th> Volume </th>
    <th> Type </th>
    <th> Description </th>
    <th> Remove </th>
   
    
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

<?php foreach($data['getMedicines'] as $getMedicine) : ?>
  <tr>
    <td>  </td>
    <td> <?php echo $getMedicine->medicinename; ?> </td>
    <td> <?php echo $getMedicine->refno; ?> </td>
    <td> <?php echo $getMedicine->category; ?> </td>
    <td> <?php echo $getMedicine->volume; ?> </td>
    <td> <?php echo $getMedicine->type; ?> </td>
    <td> <?php echo $getMedicine->description; ?> </td>
    <td> <input type="submit" class="smallOpen-button" value="Remove"> 
    </td>
  </tr>

<?php endforeach; ?>

</table>
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

