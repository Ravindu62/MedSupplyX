<!DOCTYPE html>
<html lang="en">

<head>
  <title> History </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="anim">
      <div class="horizontaltab">
        <button class="tablinks active" onclick="openEvent(event, 'deliveredOrders')"> <i class="fa-solid fa-truck"></i> DELIVERED ORDERS</button>
        <button class="tablinks" onclick="openEvent(event, 'rejectedOrders')"><i class="fa-solid fa-ban"></i> REJECTED ORDERS</button>
        <button class="tablinks" onclick="openEvent(event, 'cancelledOrders')"> <i class="fa-solid fa-xmark"></i> CANCELLED ORDERS</button>
      </div>


      <div id="deliveredOrders" class="tabcontent">
        <div class="smallspace"></div>
        <h2> Delivered Orders </h2>

        <div class="anim">
          <form class="search">
            <input type="text" id="myInput" placeholder="Seach Medicine Names..." onkeyup="search()">
            <i class="fas fa-search" id="searchicon"></i>
          </form>
          <table class="customers" id="myTable">
            <tr>
              <th class="custom1"> </th>
              <th class="custom1"> Pharmacy Name </th>
              <th class="custom1"> Medicine Name </th>
              <th class="custom1"> Brand </th>
              <th class="custom1"> Quantity </th>
              <th class="custom1"> Delivered Date </th>
            </tr>
            <tr>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
              <td> </td>
             
            </tr>
            <?php foreach ($data['getDeliveredOrder'] as $order) : ?>
              <tr>
                <td> </td>
                <td> <?php echo $order->pharmacyName; ?> </td>
                <td> <?php echo $order->medicineName; ?> </td>
                <td> <?php echo $order->brand; ?> </td>
                <td> <?php echo $order->total; ?> </td>
                <td> <?php echo $order->createdAt; ?> </td>
                
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>

    <div id="rejectedOrders" class="tabcontent">

      <div class="anim">
        <h2> Rejected Orders </h2>
      </div>
      <div class="anim">
        <form class="search">
          <input type="text" id="myInput2" placeholder="Seach Medicine Names..." onkeyup="orderSearch2()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers" id="myTable2">
          <tr>
            <th> </th>
            <th> Pharmacy Name </th>
            <th> Medicine Name </th>
            <th> brand </th>
            <th> Quantity </th>
            <th> Ordered Date </th>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
          </tr>
          <?php foreach ($data['getRejectedOrder'] as $order1) : ?>
            <tr>
              <td> </td>
              <td> <?php echo $order1->pharmacyName; ?> </td>
              <td> <?php echo $order1->medicineName; ?> </td>
              <td> <?php echo $order1->brand; ?> </td>
              <td> <?php echo $order1->quantity; ?> </td>
              <td> <?php echo $order1->orderedDate; ?> </td>
            </tr>
          <?php endforeach; ?>
       
        </table>
      </div>
    </div>


    <div id="cancelledOrders" class="tabcontent">

      <div class="anim">
        <h2> Cancelled Orders (By Pharmacies) </h2>
      </div>
      <div class="anim">
        <form class="search">
          <input type="text" id="myInput3" placeholder="Seach Medicine Names..." onkeyup="orderSearch3()">
          <i class="fas fa-search" id="searchicon"></i>
        </form>
        <table class="customers" id="myTable3">
          <tr>
            <th class="custom3"> </th>
            <th class="custom3"> Pharmacy Name </th>
            <th class="custom3"> Medicine Name </th>
            <th class="custom3"> Brand </th>
            <th class="custom3"> Quantity </th>
          </tr>

          <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        
          </tr>
          <?php foreach ($data['getCancelledOrder'] as $order2) : ?>
            <tr>
              <td> </td>
              <td> <?php echo $order2->pharmacyname; ?> </td>
              <td> <?php echo $order2->medicine_name; ?> </td>
              <td> <?php echo $order2->brand; ?> </td>
              <td> <?php echo $order2->quantity; ?> </td>
            
            </tr>
          <?php endforeach; ?>
        </table>
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
        tablinks[i].classList.remove("active"); // Remove active class from all tabs
      }
      document.getElementById(cityName).style.display = "block";
      if (evt) {
        evt.currentTarget.classList.add("active"); // Add active class to the clicked tab
      } else {
        document.querySelector("button.tablinks").classList.add("active"); // Add active class to the default tab
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      openEvent(null, 'deliveredOrders'); // Set the default tab to be active
    });
  </script>


  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>