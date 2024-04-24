<!DOCTYPE html>
<html lang="en">

<head>
  <title> Place New Order </title>
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
    <div class="anim">
      <h2> Add Order </h2>
    </div>
    <div class="smallspace"></div>

    <div class="anim">
    
          <form action="" method="POST" class="orderform">
         <!--  display registered medicines-->

          <table class="customers">
            <tr>
              <th> Medicine Name </td>
              <th> Ref Number </td>
              <th> Category </td>
              <th> Volume </td>
              <th> Type </td>

            </tr>

            <tr>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
            </tr>

            <?php foreach ($data['medicine'] as $medicine) : ?>
              <tr onclick="window.location='<?php echo URLROOT; ?>/pharmacies/submitOrder/<?php echo $medicine->medicineId; ?>'">
                <td> <?php echo $medicine->medicinename; ?> </td>
                <td> <?php echo $medicine->refno; ?> </td>
                <td> <?php echo $medicine->category; ?> </td>
                <td> <?php echo $medicine->volume; ?> </td>
                <td> <?php echo $medicine->type; ?> </td>
              </tr>
            <?php endforeach; ?>
          </table>

        </div>
      </div>






    </div>

  

  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>


