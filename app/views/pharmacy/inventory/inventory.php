<!DOCTYPE html>
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
      <input type="text" id="myInput" placeholder="Seach for Medicines" onkeyup="search()">
      <i class="fas fa-search" id="searchicon"></i>
    </form>

    <br>
    <div class="anim">
      <table class="customers" id="myTable">
        <tr>
          <th> Medicine Name </th>
          <th> Batch No </th>
          <th> Volume </th>
          <th> Category </th>
          <th> Quantity </th>
          <th> Unit Price</th>
          <th> Expire Date </th>
          <th colspan="2"> Update/Remove</th>


        </tr>

        <?php foreach ($data['inventory'] as $inventory) : ?>
          <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showInventoryDetails/<?php echo $inventory->id; ?>'>
            <td> <?php echo $inventory->name; ?> </td>
            <td> <?php echo $inventory->batch_no; ?> </td>
            <td> <?php echo $inventory->brand; ?> </td>
            <td> <?php echo $inventory->volume . ' ' . $inventory->type; ?> </td>
            <td> <?php echo $inventory->category; ?> </td>
            <td> <?php echo $inventory->quantity; ?> </td>
            <td> <?php echo $inventory->unit_amount; ?> </td>
            <td> <?php echo date('Y-m-d', strtotime($inventory->expire_date)); ?> </td>
            <td>
              <a href="<?php echo URLROOT; ?>/pharmacies/editInventory/<?php echo $inventory->id ?>"><button class="smallOpen-button">Edit</button></a>                
              <div class="smallspace"></div>
                <form action="<?php echo URLROOT; ?>/pharmacies/removeInventory" method="POST">
                <input type="submit" id="remove" class="smallOpen-button" name="remove" value="Remove">
                <input type="hidden" name="id" value="<?php echo $inventory->id; ?>">
                </form>
            </td>
            
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