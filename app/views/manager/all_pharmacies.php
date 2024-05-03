<!DOCTYPE html>
<html lang="en">

<head>
  <title> Pharmacies </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .hidden {
      display: none;
    }
  </style>
</head>

<body>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <h2 class="anim"> Registered Pharmacies </h2>
    <p class="anim"> Here are all the Pharmacies who registered to the MedSupplyX </p>



    <div class="anim">
      <table class="customers">
        <tr>
          <th> </th>
          <th> Licence No </th>
          <th> Pharmacy Name </th>
          <th> Physical Address </th>
          <th> Contact No </th>
          <th> Email </th>
          <th colspan="2"> Licence </th>
          <th> Action </th>
        </tr>
        <tr>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> </td>
          <td> <!-- <button> Accept </button> --> </td>
        </tr>
        <?php foreach ($data['allPharmacies'] as $allPharmacies) : ?>
          <tr class="pharmacy-row"> <!-- Added class for easier selection -->
            <td> </td>
            <td> <?php echo $allPharmacies->licenceno; ?> </td>
            <td> <?php echo $allPharmacies->name; ?> </td>
            <td> <?php echo $allPharmacies->address; ?> </td>
            <td> <?php echo $allPharmacies->phone; ?> </td>
            <td> <?php echo $allPharmacies->email; ?> </td>
            <td>
              <a href="<?php echo URLROOT; ?>/public/uploads/PharmacyLicence/<?php echo $allPharmacies->licence; ?>" target="_blank">
                <i class="fa fa-file-pdf-o" style="font-size:20px;color:red;"></i>
              </a>
            </td>
            <td>
              <a href="<?php echo URLROOT; ?>/public/uploads/PharmacyLicence/<?php echo $allPharmacies->licence; ?>" target="_blank" download>
                <i class="fa fa-download" aria-hidden="true"></i>
              </a>
            </td>
            <td>
            <a href="<?php echo URLROOT; ?>/managers/deletepharmacy/<?php echo $allPharmacies->id; ?>">
              <button class="addBtn2"> Delete </button>
              </a>
            </td>
          <?php endforeach; ?>
          </tr>
      </table>
    </div>
    <div class="middlespace"> </div>
    <div id="pagination"> <!-- Added pagination div -->
      <button id="prevBtn" style='font-size:24px'> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
      <span id="currentPage"> </span>
      <button id="nextBtn" style='font-size:24px'> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
    </div>
  </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>

  <script>
    $(document).ready(function() {
      var rowsPerPage = 10; // Change this value to the desired number of rows per page
      var $rows = $('.pharmacy-row');
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
</body>

</html>