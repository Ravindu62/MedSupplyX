<!DOCTYPE html>
<html lang="en">

<head>
  <title> Place New Order </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">

  <style>
    .hidden {
      display: none;
    }
  </style>
</head>

<body>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

  <!-- content -->
  <div class="content">
    <div class="anim">
      <h2> Add Order </h2>
    </div>

    <form class="search" action="<?php echo URLROOT ?>/pharmacies/addOrder" method="POST">
      <input type="text" name="search" id="myInput" placeholder="Search Medicine Names..." value="<?php echo $data['search'] ?>">
      <button type="submit"><i class="fas fa-search" id="searchicon2"></i></button>
    </form>

    <div class="smallspace"></div>

    <div class="anim">
    
          <form action="" method="POST" class="orderform">
         <!--  display registered medicines-->

          <table class="customers">
            <tr>
              <th> Medicine Name </td>
              <th> Ref Number </td>
              <th> Category </td>
              <th> Volume /Type </td>
              

            </tr>

            <tr>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
             
            </tr>

            <?php foreach ($data['medicine'] as $medicine) : ?>
              <tr onclick="window.location='<?php echo URLROOT; ?>/pharmacies/submitOrder/<?php echo $medicine->medicineId; ?>'" class="medicine-row">
                <td> <?php echo $medicine->medicinename; ?> </td>
                <td> <?php echo $medicine->refno; ?> </td>
                <td> <?php echo $medicine->category; ?> </td>
                <td> <?php echo $medicine->volume; ?> 
                 <?php echo $medicine->type; ?> </td>
              </tr>
            <?php endforeach; ?>
          </table>
          <div class="middlespace"></div>
          <div id="pagination">
          <button id="prevBtn" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
          <span id="currentPage"> 01 </span>
          <button id="nextBtn" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
        </div>
        </div>
      </div>






    </div>
<script>
        $(document).ready(function() {
        var rowsPerPage = 10; // Change this value to the desired number of rows per page
        var $rows = $('.medicine-row');
        var totalRows = $rows.length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);
        var currentPage = 1;

        showPage(1);

        $('#prevBtn').click(function() {
          if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
          }
        });

        $('#nextBtn').click(function() {
          if (currentPage < totalPages) {
            currentPage++;
            showPage(currentPage);
          }
        });

        function showPage(page) {
          var startIndex = (page - 1) * rowsPerPage;
          var endIndex = startIndex + rowsPerPage;

          $rows.addClass('hidden');
          $rows.slice(startIndex, endIndex).removeClass('hidden');

          $('#currentPage').text('Page ' + page + ' of ' + totalPages);
        }
      });

</script>
  

  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>


