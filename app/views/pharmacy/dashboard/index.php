<DOCTYPE html>
  <html lang="en">

  <head>
    <title> Dashboard </title>
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

      <br>
      <h2 class="anim"> Dashboard</h2>
      <p class="anim"> Here are the important details.</p>
      <br>
      <br>
      <div class="row">
        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countTotalOrders']; ?> </h3>
            <a href="<?php echo URLROOT; ?>/pharmacies/ongoingOrders"> Total Ongoing Orders </a>
          </div>
        </div>

        <div class="column">
          <div class="card2">
            <h3><?php echo $data['countAcceptedOrders']; ?> </h3>
            <a href="<?php echo URLROOT; ?>/pharmacies/acceptedOrders"> Accepted Orders </a>
          </div>
        </div>

        <div class="column">
          <div class="card3">
            <h3> <?php echo $data['countPendingOrders']; ?></h3>
            <a href="<?php echo URLROOT; ?>/pharmacies/pendingOrders">Pending Orders </a>
          </div>
        </div>

        <div class="column">
          <div class="card4">
            <h3> <?php echo $data['countRejectedOrders']; ?> </h3>
            <a href="<?php echo URLROOT; ?>/pharmacies/rejectedOrders"> Rejected Orders </a>
          </div>
        </div>


        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countCancelledOrders']; ?> </h3>
            <a href="<?php echo URLROOT; ?>/pharmacies/cancelledOrders"> Cancelled Orders </a>
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countTodaysCustomerOrders']; ?> </h3>
            <a href="<?php echo URLROOT; ?>/pharmacies/todayCustomerOrders"> Todays Customer Orders </a><!-- get the bill count from bills where date match to date -->
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countBills']; ?> </h3>
            <a href=""> Bill count </a><!-- how many bills generated alltime -->
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countOutOfStockProducts']; ?> </h3>
            <p> Bill count </p><!-- need to change -->
          </div>
        </div>
      </div>
    
    <div class="space"></div>
    <div class="smallspace"></div>

    <div class="chartbackground">
      <div class="anim">
        <div id="piechart" class="chart1"></div>
        <div id="barchart" class="chart1"></div>
      </div>
    </div>
    <!-- <div class="centerbtn">
    <button class="downloadbtn"> Download Report </button>
    </div> -->
    </div>

    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Total Orders', <?php echo $data['countTotalOrders']; ?>],
          ['Accepted Orders', <?php echo $data['countAcceptedOrders']; ?>],
          ['Out of Stock Products', <?php echo $data['countOutOfStockProducts']; ?>],
          ['Expired Products', <?php echo $data['countExpiredOrders']; ?>]
        ]);

        var options = {
          title: 'Current Status',
          slices: {
            0: {
              color: '#00607f'
            },
            1: {
              color: '#006faf'
            },
            2: {
              color: '#007faf'
            }
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }


      function drawChart1() {
        /* Define the chart to be drawn.*/
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Count'],
          ['Total Orders', <?php echo $data['countTotalOrders']; ?>],
          ['Accepted Orders', <?php echo $data['countAcceptedOrders']; ?>],
          ['Out of Stock Products', <?php echo $data['countOutOfStockProducts']; ?>],
          ['Expired Products', <?php echo $data['countExpiredOrders']; ?>],
        ]);
        var options = {
          title: 'Counts of Orders',
          hAxis: {
            title: 'Count',
            viewWindow: {
              min: [7, 30, 0],
              max: [17, 30, 0]
            }
          },
          vAxis: {
            title: 'Category'
          },
          isStacked: true

        };
        /* Instantiate and draw the chart.*/
        var chart = new google.visualization.BarChart(document.getElementById('barchart'));
        chart.draw(data, options);
      }
      google.charts.setOnLoadCallback(drawChart1);
    </script>
  </body>

  </html>