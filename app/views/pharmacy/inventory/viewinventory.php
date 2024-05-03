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
  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
  <h2>
            <br>
            <div class="alignRight">
                <a href="<?php echo URLROOT; ?>/pharmacies/inventory ?>"> <button class="addBtn"> Go Back </button> </a>
            </div>
        </h2>
 <table>
  <tr>
     <td> <div class="red-rectangle"></div> </td>
     <td>  <div class="importantMessage"> Near to expire medicines </div></td>
   
    </tr>
  </table>
  <div class="middlespace"></div>

    <h2>
      <div class="anim">
        <?php if (isset($data['samemedicineinventory'][0])) : ?>
          <?php echo $data['samemedicineinventory'][0]->name; ?>
        <?php endif; ?>
      </div>
        </h2>

      <i> Total quantity: </i>
       <?php 
        // Calculate total quantity
        $totalQuantity = 0;
        foreach ($data['samemedicineinventory'] as $samemedicineinventory) {
          $totalQuantity += $samemedicineinventory->quantity;
        }
        echo $totalQuantity;
      ?>  



    
    <div class="anim">
      <table class="customers">
        <tr>

          <th> Brand </th>
          <th> Volume/Type </th>
          <th> Batch No </th>
          <th> Manufacture Date </th>
          <th> Expire Date </th>
          <th> Quantity </th>
          <th> Change/Reduce </th>
        </tr>
        <?php foreach ($data['samemedicineinventory'] as $samemedicineinventory) : ?>
          <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showInventoryDetails/<?php echo $samemedicineinventory->id; ?>'>
            <td> <?php echo $samemedicineinventory->brand ?> </td>
            <td> <?php echo $samemedicineinventory->volume ?>
              <?php echo $samemedicineinventory->type ?> </td>
            <td> <?php echo $samemedicineinventory->batch_no ?> </td>
            <td> <?php echo date('Y-m-d', strtotime($samemedicineinventory->manu_date)) ?> </td>
            <td> <?php echo date('Y-m-d', strtotime($samemedicineinventory->expire_date)) ?> </td>
            <td> <?php echo $samemedicineinventory->quantity ?> </td>
            <td>
                <a href="<?php echo URLROOT; ?>/pharmacies/changeInventory/<?php echo $samemedicineinventory->id ?>" class="nodec">
                  <div class="smallOpen-button"> Add </div>
                </a>
                <div class="smallspace"></div>
                <a href="<?php echo URLROOT; ?>/pharmacies/reduceInventory/<?php echo $samemedicineinventory->id ?>" class="nodec">
                  <div class="smallOpen-button"> Reduce </div>
                </a>
                <div class="smallspace"></div>
                <a href="<?php echo URLROOT; ?>/pharmacies/removeInventory/<?php echo $samemedicineinventory->id; ?>" class="nodec">

                  <div class="smallOpen-button"> Remove </div>
                </a>
              </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  </div>
  <div class="chat-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
      <label for="text"><b> Number of new item </b></label>
      <input class="bar" type="text" placeholder="Enter the new items that arrived" name="price" required>
      <br> <br>
      <button type="submit" class="btn"> Update </button>
      <button type="button" class="btn cancel" onclick="closeForm()"> Close </button>
    </form>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>

  <script>
    // Show alert message when expire date is near
    var today = new Date();
    var rows = document.querySelectorAll(".customers tr");
    rows.forEach(function(row, index) {
      if (index > 0) {
        var expireDate = new Date(row.cells[4].textContent); // Assuming expiration date is in the 6th cell
        var daysDifference = Math.floor((expireDate - today) / (1000 * 60 * 60 * 24));
        if (daysDifference <= 10) { // Check if expire date is within 30 days
          row.style.backgroundColor = "#ff8888"; // Change background color for highlighting
          alert("Warning: The expiration date of " + row.cells[0].textContent + " is approaching!");
        }
      }
    });
  </script>

</body>

</html>