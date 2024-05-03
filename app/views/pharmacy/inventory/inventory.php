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
        <a href="<?php echo URLROOT; ?>/pharmacies/addmedicineinventory"> <button class="addBtn"> Add Inventory </button> </a>
      </div>
      <div class="anim">
        Inventory
      </div>
    </h2>
    <form class="search" action="<?php echo URLROOT ?>/pharmacies/inventory" method="POST">
      <input type="text" name="search" id="myInput" placeholder="Search Medicine Names..." value="<?php echo $data['search'] ?>">
      <button type="submit" id="searchicon"><i class="fas fa-search"></i></button>
    </form>

    <br>
    <div class="anim">
      <table class="customers" id="myTable">
        <tr>
          <th> Medicine Name </th>
          <th> Category </th>
          <th> Total Quantity </th>

          <th> View </th>

        </tr>

        <?php foreach ($data['inventory'] as $inventory) : ?>
          <tr onclick="window.location.href='<?php echo URLROOT; ?>/pharmacies/medicinestock/<?php echo $inventory->medicineId; ?>'">
            <td> <?php echo $inventory->name; ?> </td>
            <td> <?php echo $inventory->category; ?> </td>
            <td> <?php echo $inventory->totalQuantity; ?> </td>

            <td> <a href="<?php echo URLROOT; ?>/pharmacies/viewinventory/<?php echo $inventory->medicineId; ?>"> <i class="fa fa-eye" aria-hidden="true" style="font-size:24px;color:#00607f;"></i>
              </a> </td>
          </tr>
        <?php endforeach; ?>

      </table>
    </div>
  </div>
  </div>
  </script>

  <div class="middlespace"></div>
  <div class="pagination">
    <button class="addBtn2" id="prevPage"><i class="fas fa-arrow-alt-circle-left"></i></button>
    <span id="currentPage">01</span>
    <button class="addBtn2" id="nextPage"><i class="fas fa-arrow-alt-circle-right"></i></button>
  </div>
  <script>
    $(document).ready(function() {
      var currentPage = 1;
      var rowsPerPage = 2; // Number of rows per page
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


  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>