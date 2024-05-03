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

    <form class="search" action="<?php echo URLROOT ?>/managers/medicines" method="POST">
      <input type="text" name="search" id="myInput" placeholder="Search Medicine Names..." value="<?php echo $data['search'] ?>">
      <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
    </form>
    <!-- search bar -->
    
    <div class="smallspace"></div>
    <div class="smallspace"></div>
    <div class="smallspace"></div>
    <div class="anim">
      <table class="customers" id="medicineTable">
        <tr>
          <th>Medicine Name</th>
          <th>Reference No</th>
          <th>Category</th>
          <th>Volume</th>
          <th>Available brands</th>
          <th>Description</th>
        </tr>
        <?php foreach ($medicines as $medicine) : ?>
          <tr onclick="window.location='<?php echo URLROOT; ?>/managers/new_brand/<?php echo $medicine->medicineId; ?>'">
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
    <div class="middlespace"></div>
    <div class="pagination">
      <button class="addBtn2" id="prevPage"><i class="fas fa-arrow-alt-circle-left"></i></button>
      <span id="currentPage">1</span>
      <button class="addBtn2" id="nextPage"><i class="fas fa-arrow-alt-circle-right"></i></button>
    </div>
    <script>
      function submitForm() {
        document.querySelector('.search').submit();
      }
      
      $(document).ready(function() {
        var currentPage = 1;
        var rowsPerPage = 10; // Number of rows per page
        var table = $('#medicineTable');
        var rows = table.find('tr').not(':first');
        var totalPages = Math.ceil(rows.length / rowsPerPage);

        function showRowsForPage(page) {
          var startIndex = (page - 1) * rowsPerPage;
          var endIndex = startIndex + rowsPerPage;
          rows.hide().slice(startIndex, endIndex).show();
          $('#currentPage').text(page);
        }

        showRowsForPage(currentPage);

        $('#prevPage').click(function() {
          if (currentPage > 1) {
            currentPage--;
            showRowsForPage(currentPage);
          }
        });

        $('#nextPage').click(function() {
          if (currentPage < totalPages) {
            currentPage++;
            showRowsForPage(currentPage);
          }
        });
      });
    </script>
  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>
