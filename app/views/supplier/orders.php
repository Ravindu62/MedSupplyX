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
        <button class="tablinks active" onclick="openEvent(event, 'orders')"> <i class="fa fa-shopping-cart" style="font-size:24px"> </i> ORDERS</button>
        <button class="tablinks" onclick="openEvent(event, 'approvedOrders')"> <i class="fa fa-gavel"> </i> APPROVED ORDERS</button>
        <button class="tablinks" onclick="openEvent(event, 'acceptedOrders')"> <i class="fa-solid fa-check"> </i> ACCEPTED ORDERS</button>
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
              <th> Pharmacy Name</th>
              <th> Medicine Name </th>
              <th> Product Code </th>
              <th> Quantity </th>
              <th> Delivery Date </th>
              <th> Ordered Date </th>
            </tr>
            <?php foreach ($data['order'] as $order) : ?>
              <tr onclick=window.location.href='<?php echo URLROOT; ?>/suppliers/place_bid/<?php echo $order->id; ?>'>
                <td> <?php echo $order->pharmacyname; ?> </td>
                <td> <?php echo $order->medicine_name; ?> </td>
                <td> <?php echo $order->batchno; ?> </td>
                <td> <?php echo $order->quantity; ?> </td>
                <td> <?php echo $order->deliveryDate; ?> </td>
                <td> <?php echo $order->orderEndDate; ?> </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
    <div id="approvedOrders" class="tabcontent">
      <div class="smallspace"></div>
      <div class="anim">
        <h2> Approved Orders (By You) </h2>
      </div>
      <div class="anim">
        <table class="customers">
          <tr>
            <th> </th>
            <th> Pharmacy Name </th>
            <th> Medicine Name </th>
            <th> Product Code </th>
            <th> Quantity </th>
            <th> Delivery Date </th>
            <th> Price (LKR) </th>
            <th> Change / Remove </th>
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
          </tr>
        </table>
      </div>
    </div>
    <div id="acceptedOrders" class="tabcontent">
      <div class="smallspace"></div>
      <div class="anim">
        <h2> Accepted Orders (By Pharmacy) </h2>
      </div>
      <div class="anim">
        <table class="customers">
          <tr>
            <th> </th>
            <th> Medicine Name </th>
            <th> Pharmacy Name </th>
            <th> Batch No </th>
            <th> Quantity </th>
            <th> Order End Date </th>
            <th> Price (LKR) </th>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> <!-- <button class="smallOpen-button" onclick="openForm()"> accept </button> --> </td>
          </tr>
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
    document.body.addEventListener('DOMContentLoaded', openEvent(event, 'orders'));
  </script>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>