<!DOCTYPE html>
<html lang="en">

<head>
  <title> Add Inventory </title>
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
                <a href="<?php echo URLROOT; ?>/pharmacies/inventory ?>"> <button class="addBtn"> Go Back </button> </a>
            </div>
        </h2>
    <div class="anim">
      <h2> Select the Medicine </h2>
    </div>

    <form class="search">
      <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()">
      <i class="fas fa-search" id="searchicon"></i>
    </form>

    <div class="smallspace"></div>

    <div class="anim">

      <form action="" method="POST" class="orderform">
        <!--  display registered medicines-->



        <table class="customers" id="myTable">
          <tr>
            <th> Medicine </td>
            <th> Volume / Type</td>
            <th> Ref Number </td>
            <th> Category </td>
            <th> Select </th>



          </tr>

          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td></td>

          </tr>

          <?php foreach ($data['medicine'] as $medicine) : ?>
            <tr>
              <td> <?php echo $medicine->medicinename; ?> </td>
              <td> <?php echo $medicine->volume; ?>
                <?php echo $medicine->type; ?> </td>
              <td> <?php echo $medicine->refno; ?> </td>
              <td> <?php echo $medicine->category; ?> </td>
              <td>
                <a href="<?php echo URLROOT; ?>/pharmacies/addinventory/<?php echo $medicine->medicineId ?>" class="nodec">
                  <div class="smallOpen-button"> Select </button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>

    </div>
  </div>






  </div>



  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>