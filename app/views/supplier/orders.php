<!DOCTYPE html>
<html lang="en">

<head>
  <title> Order requests </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
  <div class="content">
    <div class="anim">
      <div class="horizontaltab">
        <button class="tablinks active" onclick="openEvent(event, 'orders')"> <i class="fa fa-shopping-cart"> </i> ORDERS</button>
        <button class="tablinks" onclick="openEvent(event, 'acceptedOrders')"> <i class="fa fa-gavel"> </i> ACCEPTED ORDERS</button>
        <button class="tablinks" onclick="openEvent(event, 'approvedOrders')"> <i class="fa-solid fa-check"> </i> APPROVED ORDERS</button>
      </div>
      <!-- content -->
      <div id="orders" class="tabcontent">
        <div class="smallspace"></div>
        <h2> Order Requests </h2>
        <div class="anim">
          <form class="search">
            <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()">
            <i class="fas fa-search" id="searchicon"></i>
          </form>
          <table class="customers" id="myTable">
            <tr>
              <th> Ordered Date</th>
              <th> Pharmacy Name</th>
              <th> Medicine Name </th>
              <th> Category </th>
              <th> Type </th>
              <th> Volume </th>
              <th> Brand </th>
              <th> Quantity </th>
              <th> Delivery Date </th>
            </tr>
            <?php foreach ($data['order'] as $order) : ?>
              <tr onclick=window.location.href='<?php echo URLROOT; ?>/suppliers/place_bid/<?php echo $order->id; ?>'>
                <td> <?php echo date('Y-m-d', strtotime($order->createdAt)); ?> </td>
                <td> <?php echo $order->pharmacyname; ?> </td>
                <td> <?php echo $order->medicine_name; ?> </td>
                <td> <?php echo $order->category; ?> </td>
                <td> <?php echo $order->type; ?> </td>
                <td> <?php echo $order->volume; ?> </td>
                <td> <?php echo $order->brand; ?> </td>
                <td> <?php echo $order->quantity; ?> </td>
                <td> <?php echo $order->deliveryDate; ?> </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <div id="acceptedOrders" class="tabcontent">
      <div class="smallspace"></div>
      <div class="anim">
        <h2> Accepted Orders (By You) </h2>
      </div>
      <div class="anim">
        <form class="search">
          <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers">
          <tr>
            <th> Accepted Date </th>
            <th> Pharmacy Name </th>
            <th> Medicine Name </th>
            <th> Volume </th>
            <th> Brand </th>
            <th> Quantity </th>
            <th> Delivery Date </th>
            <th> Bid Amount </th>
            <th> Remarks </th>
            <th> Cancel Bid </th>
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

          <?php foreach ($data['getAcceptBid'] as $getAcceptBid) : ?>
            <tr onclick=window.location.href='<?php echo URLROOT; ?>/suppliers/showAcceptedOrderDetails/<?php echo $getAcceptBid->id; ?>'>
              <td> <?php echo date('Y-m-d', strtotime($getAcceptBid->acceptedDate)); ?> </td>
              <td> <?php echo $getAcceptBid->pharmacyName; ?> </td>
              <td> <?php echo $getAcceptBid->medicineName; ?> </td>
              <td> <?php echo $getAcceptBid->volume . ' ' . $getAcceptBid->type; ?> </td>
              <td> <?php echo $getAcceptBid->brand; ?> </td>
              <td> <?php echo $getAcceptBid->quantity; ?> </td>
              <td> <?php echo $getAcceptBid->deliveryDate; ?> </td>
              <td> <?php echo $getAcceptBid->bidAmount; ?> </td>
              <td> <?php echo $getAcceptBid->remarks; ?> </td>
              <td> <a href="<?php echo URLROOT; ?>/suppliers/cancelBid/<?php echo $getAcceptBid->id; ?>"> <button class="smallOpen-button"> Cancel </button> </a> </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
    <div id="approvedOrders" class="tabcontent">
      <div class="smallspace"></div>
      <div class="anim">
        <h2> Approved Orders (By Pharmacy) </h2>
      </div>
      <div class="anim">
        <form class="search">
          <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers">
          <tr>
            <th> Accepted Date </th>
            <th> Approved Date </th>
            <th> Pharmacy Name </th>
            <th> Medicine Name </th>
            <th> Volume </th>
            <th> Brand </th>
            <th> Quantity </th>
            <th> Delivery Date </th>
            <th> Bid Amount </th>
            <th> Reply to Remarks </th>
            <th> Status </th>
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
            <td> </td>
          </tr>

          <?php foreach ($data['getApprovedBid'] as $getApprovedBid) : ?>
            <tr onclick=window.location.href='<?php echo URLROOT; ?>/suppliers/showApprovedOrderDetails/<?php echo $getApprovedBid->id; ?>'>
              <td> <?php echo date('Y-m-d', strtotime($getApprovedBid->acceptedDate)); ?> </td>
              <td> <?php echo date('Y-m-d', strtotime($getApprovedBid->approvedDate)); ?> </td>
              <td> <?php echo $getApprovedBid->pharmacyName; ?> </td>
              <td> <?php echo $getApprovedBid->medicineName; ?> </td>
              <td> <?php echo $getApprovedBid->volume . ' ' . $getApprovedBid->type; ?> </td>
              <td> <?php echo $getApprovedBid->brand; ?> </td>
              <td> <?php echo $getApprovedBid->quantity; ?> </td>
              <td> <?php echo $getApprovedBid->deliveryDate; ?> </td>
              <td> <?php echo $getApprovedBid->bidAmount; ?> </td>
              <td> <?php echo $getApprovedBid->reply; ?> </td>
              <td> <a href="<?php echo URLROOT; ?>/suppliers/deliverOrder/<?php echo $getApprovedBid->id; ?>"> <button class="smallOpen-button"> Deliver </button> </a> <div class="smallspace"></div>
                <a href="<?php echo URLROOT; ?>/suppliers/rejectBid/<?php echo $getApprovedBid->id; ?>"> <button class="smallOpen-button"> Reject </button> </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>


    <div id="popup1" class="overlay">
      <div class="popup">
        <form action="<?php echo URLROOT; ?>/suppliers/orders" method="POST" class="form-container">
          <label for="text"><b> Your Price ? (Rs.)</b></label>
          <input class="bar" type="text" placeholder="Enter Your Price" name="price" required>
          <br> <br>
          <button type="submit" class="btn"> Approve </button>
          <a href="#"> <button type="button" class="btn cancel"> Close </button>
        </form>
      </div>
    </div>
  </div>
  </div>
  <!-- <script>
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
    document.body.addEventListener('DOMContentLoaded', openEvent(event, 'orders'));
  </script> -->

  <script>
    // Function to open the selected tab
    function openEvent(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");

      // Hide all tab contents
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Remove the "active" class from all tab buttons
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Display the selected tab content
      document.getElementById(cityName).style.display = "block";

      // Add the "active" class to the clicked tab button
      if (evt) evt.currentTarget.className += " active";
    }

    // Automatically open the "orders" tab when the page loads
    window.onload = function() {
      openEvent(null, 'orders');
    };
  </script>



  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>