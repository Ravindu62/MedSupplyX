<DOCTYPE html>

  <html lang="en">

  <head>
    <title> Dashboard </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
    <script>
      window.onload = function() {
        var chartData = <?php echo json_encode($data['countEachMedicine']); ?>;

        if (chartData.length > 0) {
          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
              text: "Your Medicine Brands"
            },
            axisX: {
              interval: 1
            },
            axisY2: {
              interlacedColor: "rgba(1,77,101,.2)",
              gridColor: "rgba(1,77,101,.1)",
              title: "Number of brands"
            },
            data: [{
              type: "bar",
              name: "companies",
              color: "#014D65",
              axisYType: "secondary",
              dataPoints: chartData.map(function(medicine) {
                return {
                  y: parseInt(medicine.medicine_count),
                  label: medicine.medicineName
                };
              })
            }]
          });

          chart.render();
        } else {
          chartContainerWrapper.style.display = "none";
        }

        var chart = new CanvasJS.Chart("chartContainer1", {
          animationEnabled: true,
          theme: "light2", // 
          title: {
            text: "Order Status"
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
                y: <?php echo $data['countTotalOrders']; ?>,
                label: "Total Orders",
                color: "#014D65"
              },
              {
                y: <?php echo $data['countOrders']; ?>,
                label: "Total Accepted Orders",
                color: "#014D65"
              }




            ]
          }]
        });
        chart.render();

      }
    </script>
  </head>


  </head>

  <body>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
      <h2 class="anim"> Dashboard </h2>
      <p class="anim"> Here are the important details.</p>
      <br>
      <div class="row">
        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countTotalOrders']; ?> </h3>
            <p> Total Orders </p>
          </div>
        </div>
        <div class="column">
          <div class="card2">
            <h3> <?php echo $data['countOrders']; ?> </h3>
            <p> Total accepted orders </p>
          </div>
        </div>
        <a href="<?php echo URLROOT; ?>/suppliers/expiremedicines">
          <div class="column">
            <div class="card3">
              <h3> <?php echo $data['countGoingToExpireMedicine']; ?> </h3>
              <p> Going To Expired </p>
            </div>
          </div>
        </a>
        <div class="column">
          <div class="card4">
            <h3> <?php echo $data['countMedicines']; ?> </h3>
            <p> Medicine Stocks </p>
          </div>
        </div>
      </div>
      <div class="space"></div>



      <div id="chartContainer" style="height: 300px; width: 100%;"></div>


      <div class="space"></div>


      <div id="chartContainer1" style="height: 300px; width: 100%;"></div>







    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
  </body>

  </html>