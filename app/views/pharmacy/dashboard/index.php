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
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/ongoingOrders"> Total Ongoing Orders </a>
          </div>
        </div>

        <div class="column">
          <div class="card2">
            <h3><?php echo $data['countAcceptedOrders']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/acceptedOrders"> Accepted Orders </a>
          </div>
        </div>

        <div class="column">
          <div class="card3">
            <h3> <?php echo $data['countPendingOrders']; ?></h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/pendingOrders">Pending Orders </a>
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

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countTodaysCustomerOrders']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/pharmacies/todaysCustomerOrders"> Todays Customer Orders </a><!-- get the bill count from bills where date match to date -->
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countBills']; ?> </h3>
            <a class="dashboard-a" href=""> Bill count </a><!-- how many bills generated alltime -->
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
          <div id="piechart2" class="chart2"></div>
          <div id="piechart1" class="chart1"></div>
          <div id="barchart1" class="chart1"></div>
          <div id="barchart2" class="chart2"></div>
        </div>
      </div>

    </div>

    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['corechart']
      });

      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Today Customer Orders', <?php echo $data['countTotalOrders']; ?>],
          ['Accepted Orders', <?php echo $data['countAcceptedOrders']; ?>],
          ['Pending Orders', <?php echo $data['countPendingOrders']; ?>],
          ['Rejected Products', <?php echo $data['countRejectedOrders']; ?>], // Comma was missing here
          ['Cancelled Products', <?php echo $data['countCancelledOrders']; ?>]
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
            },
            3: {
              color: '#008faf'
            },
            4: {
              color: '#009faf'
            }
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Total Orders', <?php echo $data['countTodaysCustomerOrders']; ?>],
          ['Bill Counts', <?php echo $data['countBills']; ?>],
        ]);

        var options = {
          title: 'Current Status',
          slices: {
            0: {
              color: '#00607f'
            },
            1: {
              color: '#006faf'
            }
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
      }

      // Call the second chart function
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Total Orders', <?php echo $data['countTotalOrders']; ?>],
          ['Accepted Orders', <?php echo $data['countAcceptedOrders']; ?>],
          ['Pending Orders', <?php echo $data['countPendingOrders']; ?>],
          ['Rejected Products', <?php echo $data['countRejectedOrders']; ?>], // Comma was missing here
          ['Cancelled Products', <?php echo $data['countCancelledOrders']; ?>]
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

        var chart = new google.visualization.BarChart(document.getElementById('barchart1'));
        chart.draw(data, options);
      }

      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Total Orders', <?php echo $data['countTodaysCustomerOrders']; ?>],
          ['Bill Counts', <?php echo $data['countBills']; ?>],
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

        var chart = new google.visualization.BarChart(document.getElementById('barchart2'));
        chart.draw(data, options);
      }
    </script>
  </body>

  </html>