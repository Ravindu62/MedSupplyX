<!DOCTYPE html>
<html lang="en">

<head>
  <title> Order from Supplier </title>
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

    <div class="horizontaltab">
      <button class="tablinks active" onclick="startEvent(event, 'orders')"> <i class="fa fa-shopping-cart"> </i> ORDERS</button>
      <button class="tablinks" onclick="startEvent(event, 'acceptedOrders')"> <i class="fa fa-gavel"> </i> ACCEPTED ORDERS</button>
      <button class="tablinks" onclick="startEvent(event, 'deliveredOrders')"> <i class="fa-solid fa-check"> </i> DELIVERED ORDERS</button>
    </div>

    <div class="smallspace"></div>
    <div id="orders" class="tabcontent">
      <div class="alignRight">
        <a href="<?php echo URLROOT ?>/pharmacies/addOrder"> <button class="addBtn"> New Order </button> </a>
      </div>
      <div class="middlespace"> </div>
      <div class="anim">
        <h2> Your Orders </h2>
      </div>



      <div class="anim">
        <form class="search">
          <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="orderSearch1()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers" id="myTable">
          <tr>
            <th> Medicine Name </th>
            <th> Ref No </th>
            <th> Category </th>
            <th> Volume </th>
            <th> Brand </th>
            <th> Quantity </th>
            <th> Ordered Date </th>
            <th> Delivery Needed </th>
           
            <th colspan="2"> Change / Delete</th>

          </tr>

          <?php foreach ($data['order'] as $order) : ?>
            <?php
            // Calculate 7 days from the created date
            $createdAt = strtotime($order->createdAt);
            $sevenDaysLater = strtotime('+7 days', $createdAt);

            // Get the current date
            $currentDate = time();

            // Check if the current date is more than 7 days after the created date
            $hideChangeButton = ($currentDate > $sevenDaysLater);
            ?>
            <tr class="orders_row">
              <td> <?php echo $order->medicine_name; ?> </td>
              <td> <?php echo $order->refno; ?> </td>
              <td> <?php echo $order->category; ?> </td>
              <td> <?php echo $order->volume . $order->type; ?> </td>
              <td> <?php echo $order->brand; ?> </td>
              <td> <?php echo $order->quantity; ?> </td>
              <td> <?php echo date('Y-m-d', $createdAt); ?> </td>
              <td> <?php echo $order->deliveryDate; ?> </td>
           
              <td>
                <a href="<?php echo URLROOT; ?>/pharmacies/changeOrderDetails/<?php echo $order->id; ?>">
                  <?php if (!$hideChangeButton) : ?>
                    <button class="smallOpen-button">Change</button>
                  <?php endif; ?>
              </td>
              <td>
                <a href="<?php echo URLROOT; ?>/pharmacies/cancelOrder/<?php echo $order->id; ?>">
                  <button class="smallOpen-button" onclick="confirmCancellation(<?php echo $order->id; ?>)">Cancel</button></a>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>

        </table>
        <div class="middlespace"> </div>
        <div id="pagination">
          <button id="prevBtn" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
          <span id="currentPage"> 01 </span>
          <button id="nextBtn" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
        </div>
        <!-- <button onclick="generatePDF()" class="printBtn">Print Report</button> -->
      </div>
    </div>

    <div id="acceptedOrders" class="tabcontent">

      <div class="anim">
        <h2> Accepted Orders (By Supplier) </h2>
      </div>

      <div class="anim">
        <form class="search">
          <input type="text" id="myInput2" placeholder="Seach Medicine Names..." onkeyup="orderSearch2()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers" id="myTable2">
          <tr>
            <th> Medicine Name </th>
            <th> Category </th>
            <th> Required Quantity </th>

          </tr>

          <?php foreach ($data['acceptedOrders'] as $acceptedOrders) : ?>
            <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/showAcceptedOrderBrandDetails/<?php echo $acceptedOrders->medicineName; ?>' class="acceptedorders-row">
              <td> <?php echo $acceptedOrders->medicineName; ?> </td>
              <td> <?php echo $acceptedOrders->category; ?> </td>
              <td> <?php echo $acceptedOrders->quantity; ?> </td>


              </form>
            </tr>
          <?php endforeach; ?>
        </table>
        <div class="middlespace"> </div>
        <div id="pagination">
          <button id="prevBtn1" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
          <span id="currentPage1"> 01 </span>
          <button id="nextBtn1" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
        </div>
      </div>
    </div>

    <div id="deliveredOrders" class="tabcontent">

      <div class="anim">
        <h2> Delivered Orders (By You) </h2>
      </div>

      <div class="anim">
        <form class="search">
          <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="ordersearch3()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers" id="myTable3">
          <tr id="medicineTable">
            <th> Medicine Name </th>
            <th> Volume </th>
            <th> Brand </th>
            <th> Quantity </th>
            <th> Ordered Date </th>
            <th> Delivery Date </th>
            <th> Supplier</th>
            <th> Price (LKR) </th>
            <th> Status </th>



          </tr>
          <?php foreach ($data['selectedOrders'] as $selectedOrders) : ?>
            <tr class="deliveredorders_row">
              <td> <?php echo $selectedOrders->medicineName; ?> </td>
              <td> <?php echo $selectedOrders->volume; ?> </td>
              <td> <?php echo $selectedOrders->brand; ?> </td>
              <td> <?php echo $selectedOrders->quantity; ?> </td>
              <td> <?php echo date('Y-m-d', strtotime($selectedOrders->orderedDate)); ?> </td>
              <td> <?php echo $selectedOrders->deliveryDate; ?> </td>
              <td> <?php echo $selectedOrders->supplierName; ?> </td>
              <td> Rs. <?php echo $selectedOrders->bidAmount; ?> </td>
              <td>
                <a href="<?php echo URLROOT; ?>/pharmacies/receivedOrder/<?php echo $selectedOrders->id; ?>" method="POST">
                  <input type="submit" id="delete" class="smallOpen-button" name="received" value="Received"></a>
              </td>

              </form>
            </tr>
          <?php endforeach; ?>
        </table>
        <div class="middlespace"> </div>
        <div id="pagination">
          <button id="prevBtn2" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-left' style="color:#00607F;"> </i></button>
          <span id="currentPage2"> 01 </span>
          <button id="nextBtn2" style='font-size:24px' type="button"> <i class='fas fa-arrow-circle-right' style="color:#00607F;"> </i></button>
        </div>
      </div>
    </div>

    <div class="chat-popup" id="myForm">
      <form action="/action_page.php" class="form-container">


        <label for="text"><b> Your Price ? </b></label>
        <input class="bar" type="text" placeholder="Enter Your Price for the order" name="price" required>
        <br> <br>

        <button type="submit" class="btn"> Send </button>
        <button type="button" class="btn cancel" onclick="closeForm()"> Close </button>
      </form>
    </div>


    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>

    <script>
      function startEvent(evt, cityName) {
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
      document.body.addEventListener('DOMContentLoaded', startEvent(event, 'orders'));
    </script>


    <script>
      function confirmCancellation(orderId) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to cancel the order?")) {
          // If user confirms, navigate to the cancel action
          window.location.href = "<?php echo URLROOT; ?>/pharmacies/cancelOrder/" + orderId;
        } else {
          // If user cancels, do nothing
          return false;
        }
      }
   

   
      $(document).ready(function() {
        var rowsPerPage = 15; // Change this value to the desired number of rows per page
        var $rows = $('.orders_row');
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
        var rowsPerPage = 15; // Change this value to the desired number of rows per page
        var $rows = $('.acceptedorders-row');
        var totalRows = $rows.length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);
        var currentPage = 1;

        showPage(1);

        $('#prevBtn1').click(function() {
          if (currentPage > 1) {
            currentPage--;
            showPage(currentPage);
          }
        });

        $('#nextBtn1').click(function() {
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

          $('#currentPage1').text('Page ' + page + ' of ' + totalPages);
        }
      });

      $(document).ready(function() {
        var rowsPerPage = 15; // Change this value to the desired number of rows per page
        var $rows = $('.deliveredorders_row');
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
    </script>
  </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>

