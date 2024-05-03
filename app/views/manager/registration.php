<DOCTYPE html>
  <html lang="en">

  <head>
    <title> Registration </title>
    <meta charset="utf-8">
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

    <?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>


    <!-- content -->
    <div class="content">

      <div class="horizontaltab2">
        <button class="tablinks active" onclick="openEvent(event, 'pharmacy')"> <i class="fas fa-laptop-medical"></i> Pharmacy Registration </button>
        <button class="tablinks" onclick="openEvent(event, 'supplier')"> <i class="fas fa-industry"></i> Supplier Registration </button>
      </div>

      <div id="pharmacy" class="tabcontent">
        <h2 class="anim"> Pharmacies </h2>
        <p class="anim"> Here are all the Pharmacies who want to register to the MedSupplyX </p>

        <div class="anim">
          <form method="post" action="<?php echo URLROOT; ?>/managers/approve_pharmacy">
            <table class="customers">

              <tr>
                <th> </th>
                <th> Licence No </th>
                <th> Pharmacy Name </th>
                <th> Physical Address </th>
                <th> Contact No </th>
                <th> Email </th>
                <th colspan="2"> Licence </th>
                <th colspan="2"> Accept / Reject </th>
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
                <td> </td>
                <td> </td>
              </tr>

              <?php foreach ($data['pharmacyRegistration'] as $pharmacyRegistration) : ?>
                <tr class="pharmacyreg_row">
                  <td> </td>
                  <td> <?php echo $pharmacyRegistration->licenceno; ?> </td>
                  <td> <?php echo $pharmacyRegistration->name; ?> </td>
                  <td> <?php echo $pharmacyRegistration->address; ?> </td>
                  <td> <?php echo $pharmacyRegistration->phone; ?> </td>
                  <td> <?php echo $pharmacyRegistration->email; ?> </td>
                  <td> <a href="<?php echo URLROOT; ?>/public/uploads/PharmacyLicence/<?php echo $pharmacyRegistration->licence; ?>" target="_blank">
                      <i class="fa fa-file-pdf-o" style="font-size:24px;color:red;"></i>
                    </a>
                  </td>
                  <td> <a href="<?php echo URLROOT; ?>/public/uploads/PharmacyLicence/<?php echo $pharmacyRegistration->licence; ?>" target="_blank" download>
                      <i class="fa fa-download" aria-hidden="true" style="font-size:22px;"></i>
                    </a>
                  </td>
                  <td> <button class="smallOpen-button" name="acceptpharmacy" value="<?php echo $pharmacyRegistration->email ?>"> Accept </button>
          </form>
          </td>

          <td>
            <form action="<?php echo URLROOT; ?>/managers/rejectPharmacy/<?php echo $pharmacyRegistration->id; ?>" method="POST">
              <input type="submit" class="smallOpen-button-red" name="reject" value="Reject">
            </form>
          </td>


          </tr>

        <?php endforeach; ?>

        </table>
        </form>
        </div>
        <div class="middlespace"> </div>
        <div id="pagination">
          <button id="prevBtn" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
          <span id="currentPage"> </span>
          <button id="nextBtn" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
        </div>

      </div>



      <div id="supplier" class="tabcontent">
        <h2 class="anim"> Suppliers </h2>
        <p class="anim"> Here are all the Suppliers who want to register to the MedSupplyX </p>

        <div class="anim">
          <form method="post" action="<?php echo URLROOT; ?>/managers/approve_supplier">
            <table class="customers">
              <tr>

                <th> </th>
                <th> Licence No </th>
                <th> Supplier Name </th>
                <th> Physical Address </th>
                <th> Contact No </th>
                <th> Email </th>
                <th colspan="2"> Licence</th>
                <th colspan="2"> Accept / Reject </th>
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

              <?php foreach ($data['supplierRegistration'] as $supplierRegistration) : ?>
                <tr class="supplierreg_row">
                  <td> </td>
                  <td> <?php echo $supplierRegistration->licenceno; ?> </td>
                  <td> <?php echo $supplierRegistration->name; ?> </td>
                  <td> <?php echo $supplierRegistration->address; ?> </td>
                  <td> <?php echo $supplierRegistration->phone; ?> </td>
                  <td> <?php echo $supplierRegistration->email; ?> </td>
                  <td> <a href="<?php echo URLROOT; ?>/public/uploads/SupplierLicence/<?php echo $supplierRegistration->licence; ?>" target="_blank">
                      <i class="fa fa-file-pdf-o" style="font-size:24px;color:red;"></i>
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo URLROOT; ?>/public/uploads/SupplierLicence/<?php echo $supplierRegistration->licence; ?>" target="_blank" download>
                      <i class="fa fa-download" aria-hidden="true" style="font-size:22px;"> </i>
                    </a>
                  </td>
                  <td> <button class="smallOpen-button" name="acceptsupplier" value="<?php echo $supplierRegistration->email ?>"> Accept </button> </td>
          </form>
          <td>
            <form action="<?php echo URLROOT; ?>/managers/rejectSupplier/<?php echo $supplierRegistration->id; ?>" method="POST">
              <input type="submit" class="smallOpen-button-red" name="reject" value="Reject">
            </form>
          </td>
          </tr>
        <?php endforeach; ?>




        </table>
        </div>
        <div class="middlespace"> </div>
        <div id="pagination">
          <button id="prevBtn2" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
          <span id="currentPage2"> </span>
          <button id="nextBtn2" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
        </div>
      </div>


    </div>
    </div>
    <div class="middlespace"> </div>






    <script>
      function openEvent(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        if (evt) evt.currentTarget.className += " active";
        else document.querySelector('button.tablinks').className += " active";
      }
      document.body.addEventListener('DOMContentLoaded', openEvent(event, 'pharmacy'));



      $(document).ready(function() {
        var rowsPerPage = 10; // Change this value to the desired number of rows per page
        var $rows = $('.pharmacyreg_row');
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


      $(document).ready(function() {
        var rowsPerPage = 10; // Change this value to the desired number of rows per page
        var $rows = $('.supplierreg_row');
        var totalRows = $rows.length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);
        var currentPage = 1;

        showPage(1);

        $('#prevBtn2').click(function() {
          if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
          }
        });

        $('#nextBtn2').click(function() {
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

          $('#currentPage2').text('Page ' + page + ' of ' + totalPages);
        }
      });


  
    // Check if success or error message exists in the URL query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success');
    const errorMessage = urlParams.get('error');

    // Display alert message based on success or error
    if (successMessage) {
        alert("Supplier registered successfully!");
    } else if (errorMessage) {
        alert("Failed to register supplier. Please try again.");
    }

</script>


    <?php require APPROOT . '/views/inc/footer.php'; ?>


  </body>

  </html>