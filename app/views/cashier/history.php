<!DOCTYPE html>
<html lang="en">
<head>
<title> History </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/cashier_sidebar.php'; ?>

<!-- content -->
  <div class="content">

  <div class="anim">  <h2> Customer Orders </h2> </div> 

<div class="anim">  
<table class="customers">
  <tr>
    <th> Customer Name </th>
    <th> Medicine Name </th>
    <th> Batch No </th>
    <th> Quantity </th>
    <th> Date </th>
    <th> Edit </th>
   
    
    
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
 
</tr>


<tr> 
  <td> Nisal </td>
  <td> Aspirine</td>
  <td> 123</td>
  <td> 12</td>
  <td> 2023/10/03</td>
  <td> <button class="smallOpen-button"> Edit </button> </td>   
 
</tr>

</table>
</div>




</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


</body>
</html>

