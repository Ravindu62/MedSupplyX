<!DOCTYPE html>
<html lang="en">
<head>
  <title> Registered Medicines </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>
  <?php $medicine_brands = $data['registerdMedicineBrands']; ?>
  <?php $medicines = $data['registeredMedicines']; ?>
  
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="anim">
      <h2> Registered Medicines </h2>
    </div>
    <div class="smallspace"></div>
    <div class="smallspace"></div>
    <div class="smallspace"></div>
    <div class="anim">
      <table class="customers">
        <tr>
          <th>Medicine Name</th>
          <th>Reference No</th>
          <th>Category</th>
          <th>Volume</th>
          <th>Available brands</th>
          <th>Description</th>
        </tr>
        <?php foreach ($medicines as $medicine) : ?>
          <tr onclick="window.location='<?php echo URLROOT; ?>/pharmacies/addInventory/<?php echo $medicine->medicineId; ?>'">
            <td> <?php echo $medicine->medicinename; ?> </td>
            <td> <?php echo $medicine->refno; ?> </td>
            <td> <?php echo $medicine->category; ?> </td>
            <td> <?php echo $medicine->volume; ?>
             <?php echo $medicine->type; ?> </td>
            <?php
            $brands = array();
            foreach ($medicine_brands as $brand) {
              if ($brand->medicineId == $medicine->medicineId) {
                $brands[] = $brand->brandname;
              }
            }
            ?>
            <td> <?php echo implode(', ', $brands); ?> </td>
            <td> <?php echo $medicine->description; ?> </td>
          </tr>
          </a>
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
