<!DOCTYPE html>
<html lang="en">

<head>
  <title> Order from Supplier </title>
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

    <div class="horizontaltab">
      <button class="tablinks active" onclick="startEvent(event, 'orders')"> <i class="fa fa-shopping-cart" style="font-size:24px"> </i> ORDERS</button>
      <button class="tablinks" onclick="startEvent(event, 'acceptedOrders')"> <i class="fa fa-gavel"> </i> ACCEPTED ORDERS</button>
      <button class="tablinks" onclick="startEvent(event, 'selectedOrders')"> <i class="fa-solid fa-check"> </i> SELECTED ORDERS</button>
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
        <table class="customers">
          <tr>
            <th> Medicine Name </th>
            <th> Batch No </th>
            <th> Quantity </th>
            <th> Ordered Date </th>
            <th> Delivery Needed </th>
            <th> Status </th>
            <th colspan="2"> Change / Delete</th>

          </tr>

          <?php foreach ($data['order'] as $order) : ?>
            <tr>
              <td> <?php echo $order->medicine_name; ?> </td>
              <td> <?php echo $order->batchno; ?> </td>
              <td> <?php echo $order->quantity; ?> </td>
              <td> <?php echo $order->createdAt; ?> </td>
              <td> <?php echo $order->deliveryDate; ?> </td>
              <td> <?php echo $order->status; ?> </td>
              <td> <button class="smallOpen-button"> Change </button> </td>
              <td>
                <form action="<?php echo URLROOT; ?>/pharmacies/deleteOrder/<?php echo $order->id; ?>" method="POST">
                  <input type="submit" id="delete" class="smallOpen-button" name="delete" value="Delete">
              </td>

              </form>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <div id="acceptedOrders" class="tabcontent">

      <div class="anim">
        <h2> Accepted Orders (By Supplier) </h2>
      </div>

      <div class="anim">
        <table class="customers">
          <tr>
            <th> Medicine Name </th>
            <th> Batch No </th>
            <th> Quantity </th>
            <th> Ordered Date </th>
            <th> Delivery Date </th>
            <th> Supplier </th>
            <th> Supplier Price (LKR) </th>
            <th> Accept / Reject </th>


          </tr>

          <?php foreach ($data['acceptedOrders'] as $acceptedOrders) : ?>
            <tr>
              <td> <?php echo $acceptedOrders->medicine_name; ?> </td>
              <td> <?php echo $acceptedOrders->batchno; ?> </td>
              <td> <?php echo $acceptedOrders->quantity; ?> </td>
              <td> <?php echo $acceptedOrders->ordered_date; ?> </td>
              <td> <?php echo $acceptedOrders->deliveryDate; ?> </td>
              <td> <?php echo $acceptedOrders->supplier_name; ?> </td>
              <td> <?php echo $acceptedOrders->status; ?> </td>
              <td> <button class="smallOpen-button"> Accept </button>
                <form action="<?php echo URLROOT; ?>/pharmacies/deleteOrder/<?php echo $order->id; ?>" method="POST">
                  <input type="submit" id="delete" class="smallOpen-button" name="delete" value="Reject">
              </td>

              </form>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>

    <div id="selectedOrders" class="tabcontent">

      <div class="anim">
        <h2> Selected Orders (By You) </h2>
      </div>

      <div class="anim">
        <table class="customers">
          <tr>
            <th> </th>
            <th> Medicine Name </th>
            <th> Batch No </th>
            <th> Quantity </th>
            <th> Ordered Date </th>
            <th> Delivery Date </th>
            <th> Supplier</th>
            <th> Price (LKR) </th>
            <th> Delivered </th>



          </tr>
          <?php foreach ($data['selectedOrders'] as $selectedOrders) : ?>
            <tr>
              <td> <?php echo $selectedOrders->id; ?> </td>
              <td> <?php echo $selectedOrders->medicine_name; ?> </td>
              <td> <?php echo $selectedOrders->batchno; ?> </td>
              <td> <?php echo $selectedOrders->quantity; ?> </td>
              <td> <?php echo $selectedOrders->ordered_date; ?> </td>
              <td> <?php echo $selectedOrders->deliveryDate; ?> </td>
              <td> <?php echo $selectedOrders->supplier_name; ?> </td>
              <td> <?php echo $selectedOrders->status; ?> </td>
              <td> <button class="smallOpen-button"> Accept </button>
                <form action="<?php echo URLROOT; ?>/pharmacies/deleteOrder/<?php echo $order->id; ?>" method="POST">
                  <input type="submit" id="delete" class="smallOpen-button" name="delete" value="Reject">
              </td>

              </form>
            </tr>
          <?php endforeach; ?>
        </table>
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

    </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>