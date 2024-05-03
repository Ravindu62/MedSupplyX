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
<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
<!-- content -->
  <div class="content">
  <div class="alignRight">
 <a href="<?php echo URLROOT; ?>/suppliers/addmedicineinventory"> <button class="addBtn"> Add New Medicine</button> </a>
  </div>

  <form class="search">
      <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()">
      <i class="fas fa-search" id="searchicon"></i>
    </form> 

  <h2>
  <div class="anim">
    Inventory 
  </div>
  </h2>
<div class="anim">    
<table class="customers" id="myTable">
 
  <tr>
    
    <th> Meidicine Name </th>
    <th> Volume/Type </th>
    <th> Category </th>
  
    <th> View </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>





  
</tr>



<?php foreach ($data['supplierinventory'] as $inventory) : ?>

<tr onclick="window.location='<?php echo URLROOT; ?>/suppliers/medicinestock/<?php echo $inventory->medicineId; ?>'"> 
  <td> <?php echo $inventory->medicineName ?> </td>
  <td> <?php echo $inventory->volume ?> 
       <?php echo $inventory->type ?> </td>
  <td> <?php echo $inventory->category ?> </td>
       
  <td> <a href="<?php echo URLROOT; ?>/suppliers/viewinventory/<?php echo $inventory->medicineId; ?>"> 
  <i class="fa fa-eye" aria-hidden="true" style="font-size:24px;color:#00607f;"></i>
  </a> </td>
</tr>
<?php endforeach; ?>
</table>

</div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>

</script>
</body>
</html>
