<!DOCTYPE html>
<html lang="en">

<head>
  <title> Dashboard </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
          text: "Current Orders"
        },
        data: [{
          type: "pie",
          startAngle: 240,
          toolTipContent: "{y} (#percent%)",
          indexLabel: "{label} #percent%",
          dataPoints: [{
              y: <?php echo $data['countTotalOngoingOrders']; ?>,
              label: "Ongoing Orders",
              color: "#00607f"
            },
            {
              y: <?php echo $data['countPendingOrders']; ?>,
              label: "Pending Orders",
              color: "#94F5FF"
            }
          ]
        }]
      });
      chart.render();


      var chart = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        theme: "light2", // 
        title: {
          text: "Count of Orders"
        },
        axisY: {
          title: "Count"
        },
        data: [{
          type: "column",
          showInLegend: true,
          legendMarkerColor: "grey",
          legendText: "Types",
          dataPoints: [{
              y: <?php echo $data['countAcceptedOrders']; ?>,
              label: "Accepted Orders",
              color: "#00B2FF"
            },
            {
              y: <?php echo $data['countApprovedOrders']; ?>,
              label: "Approved Orders",
              color: "#0276A8"
            },
            {
              y: <?php echo $data['countReceivedOrders']; ?>,
              label: "Received Orders",
              color: "#024D6D"
            }





          ]
        }]
      });
      chart.render();



      var chart = new CanvasJS.Chart("chartContainer2", {
        animationEnabled: true,
        title: {
          text: "Rejected and Cancelled Orders"
        },
        axisX: {
          interval: 1
        },
        axisY2: {
          interlacedColor: "rgba(1,77,101,.2)",
          gridColor: "rgba(1,77,101,.1)",
          title: "Number of Orders "
        },
        data: [{
          type: "bar",
          name: "companies",
          color: "#014D65",
          axisYType: "secondary",
          dataPoints: [

            {
              y: <?php echo $data['countRejectedOrders']; ?>,
              label: "Rejected Orders",
       
            },
            {
              y: <?php echo $data['countCancelledOrders']; ?>,
              label: "Cancelled  Orders",
             
            }

          ]
        }]
      });
      chart.render();

    }
  </script>
</head>

<body>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>



  <!-- content -->
  <div class="content">

    <br>
    <h2 class="anim"> Dashboard</h2>
    <p class="anim"> Here are the important details.</p>
    <br>
    <br>
    <h3>Order Status : <?php echo $data['countTotalOngoingOrders'] + $data['countPendingOrders']; ?></h3>
    <br>
    <div class="row">
      <div class="column">
        <div class="card1">
          <h3> <?php echo $data['countTotalOngoingOrders']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/ongoingOrders"> Total Ongoing Orders </a>
        </div>
      </div>

      <div class="column">
        <div class="card3">
          <h3> <?php echo $data['countPendingOrders']; ?></h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/pendingOrders">Pending Orders </a>
        </div>
      </div>

      <div class="column">
        <div class="card2">
          <h3><?php echo $data['countAcceptedOrders']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/acceptedOrders"> Accepted Orders </a>
        </div>
      </div>

      <div class="column">
        <div class="card2">
          <h3><?php echo $data['countApprovedOrders']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/approvedOrders"> Approved Orders </a>
        </div>
      </div>


      <div class="column">
        <div class="card4">
          <h3> <?php echo $data['countReceivedOrders']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/receivedOrders"> Received Orders </a>
        </div>
      </div>

      <div class="column">
        <div class="card4">
          <h3> <?php echo $data['countRejectedOrders']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/rejectedOrders"> Rejected Orders </a>
        </div>
      </div>


      <div class="column">
        <div class="card1">
          <h3> <?php echo $data['countCancelledOrders']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/cancelledOrders"> Cancelled Orders </a>
        </div>
      </div>


    </div>

    <br>
    <h3>Inventory Status</h3>
    <br>
    <div class="row">
      <div class="column">
        <div class="card1">
          <h3> <?php echo $data['countTotalMedicines']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/totalMedicines"> Total Medicines </a>
        </div>
      </div>

      <div class="column">
        <div class="card3">
          <h3> <?php echo $data['countTotalMedicineQuantity']; ?></h3>
          Total Inventory Quantity
        </div>
      </div>

      <div class="column">
        <div class="card2">
          <h3><?php echo $data['countNearExpireDateMedicines']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/nearExpireDateMedicines"> Medicines Near to Expire </a>
        </div>
      </div>

      <div class="column">
        <div class="card2">
          <h3>LKR <?php echo $data['countWorthOfInventory']; ?> </h3>
          <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/worthOfInventory"> Total Value of Inventory </a>
        </div>
      </div>

    </div>
    <div class="middlespace"></div>
<hr>



    <?php
    $chartData = [
      $data['countTotalOngoingOrders'],
      $data['countPendingOrders'],
      $data['countAcceptedOrders'],
      $data['countApprovedOrders'],
      $data['countReceivedOrders'],
      $data['countRejectedOrders'],
      $data['countCancelledOrders'],
    ];

    // Check if any of the data is greater than 0
    if (array_sum($chartData) > 0) :
    ?>
      <div class="smallspace"></div>
      <div class="chartbackground">
        <div class="anim">
          <div class="middlespace"></div>
          <div id="chartContainer" style="height: 300px; width: 40%;border:1px solid black;float:left;"></div>
          <div id="chartContainer2" style="height: 300px; width: 60%;"></div>
          <div class="middlespace"></div>
          <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
          <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        </div>
      </div>
    <?php endif; ?>
  </div>

  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>