<!DOCTYPE html>
<html lang="en">
<head>
  <title> Medicine Registration </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>
  <?php $medicine_brands = $data['getMedicineBrandsByMedicineId']; ?>
  <?php $medicines = $data['getMedicines']; ?>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="alignRight">
      <a href="<?php echo URLROOT ?>/managers/new_medicine"> <button class="addBtn2"> + New Medicine Brand </button> </a>
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
          <th>Medicine Name</th>
          <th>Reference No</th>
          <th>Category</th>
          <th>Volume</th>
          <th>Type</th>
          <th>Available brands</th>
          <th>Description</th>
        </tr>
        <?php foreach ($medicines as $medicine) : ?>
          <tr onclick="window.location='<?php echo URLROOT; ?>/managers/new_brand/<?php echo $medicine->medicineId; ?>'">
            <td> <?php echo $medicine->medicinename; ?> </td>
            <td> <?php echo $medicine->refno; ?> </td>
            <td> <?php echo $medicine->category; ?> </td>
            <td> <?php echo $medicine->volume; ?> </td>
            <td> <?php echo $medicine->type; ?> </td>
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