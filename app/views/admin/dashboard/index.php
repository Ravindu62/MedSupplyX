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

    <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>



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
            <h3> <?php echo $data['countPharmacies']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/all_pharmacies"> Pharmacies </a>
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countapprovedPharmacies']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/approvedPharmacy"> Approved
              Pharmacies </a>
          </div>
        </div>

        <div class="column">
          <div class="card2">
            <h3><?php echo $data['countpendingPharmacies']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/pendingPharmacy"> Pending Pharmacies
            </a>
          </div>
        </div>

        <div class="column">
          <div class="card2">
            <h3><?php echo $data['countrejectedPharmacies']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/rejectedPharmacy"> Rejected
              Pharmacies </a>
          </div>
        </div>

        <div class="column">
          <div class="card3">
            <h3> <?php echo $data['countSuppliers']; ?></h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/all_suppliers"> Suppliers </a>
          </div>
        </div>

        <div class="column">
          <div class="card3">
            <h3> <?php echo $data['countapprovedSuppliers']; ?></h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/approvedSupplier">Approved Suppliers
            </a>
          </div>
        </div>

        <div class="column">
          <div class="card4">
            <h3> <?php echo $data['countpendingSuppliers']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/pendingSupplier"> Pending Suppliers
            </a>
          </div>
        </div>

        <div class="column">
          <div class="card4">
            <h3> <?php echo $data['countrejectedSuppliers']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/rejectedSupplier"> Rejected Suppliers
            </a>
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countManagers']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/managers"> Managers </a>
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countOrders']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/all_orders"> TotalOrders </a>
          </div>
        </div>

        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countMedicines']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/medicines"> Medicines </a>
          </div>
        </div>


        <div class="column">
          <div class="card1">
            <h3> <?php echo $data['countMessages']; ?> </h3>
            <a class="dashboard-a" href="<?php echo URLROOT; ?>/admins/messages"> Messages </a>
          </div>
        </div>
      </div>

      <!-- Charts displaying data -->
      <div class="space"></div>
      <div class="smallspace"></div>
      <div class="chartbackground">

        <div class="anim" style="display: flex;">
          <div id="piechart1" class="chart1"></div>
          <div id="piechart2" class="chart2"></div>
        </div>
      </div>
      <br>

      <div class="chartbackground">
        <div class="anim"></div>
        <div id="barchart1" class="chart1"></div>
      </div>
    </div>

    </div>

    </div>
    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Load the Google Charts visualization library
      google.charts.load('current', {
        'packages': ['corechart']
      });

      // Callback function to draw the pie chart
      google.charts.setOnLoadCallback(drawChart1);

      // Function to draw the first pie chart
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Pharmacies', <?php echo $data['countPharmacies']; ?>],
          ['Pending Pharmacies', <?php echo $data['countpendingPharmacies']; ?>],
          ['Approved Pharmacies', <?php echo $data['countapprovedPharmacies']; ?>],
          ['Rejected Pharmacies', <?php echo $data['countrejectedPharmacies']; ?>],
        ]);

        var options = {
          title: 'Pharmacy Current Status',
          fontSize: '13',
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
          },
          chartArea: {
            width: '80%', // Increase the width of the chart area
            height: '80%' // Increase the height of the chart area
          }
        };

        // Create a new pie chart in the specified element
        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        // Draw the chart with the defined data and options
        chart.draw(data, options);
      }

      // Callback function to draw the  pie chart
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Suppliers', <?php echo $data['countSuppliers']; ?>],
          ['Pending Suppliers', <?php echo $data['countpendingSuppliers']; ?>],
          ['Approved Suppliers', <?php echo $data['countapprovedSuppliers']; ?>],
          ['Rejected Suppliers', <?php echo $data['countrejectedSuppliers']; ?>],
        ]);

        var options = {
          title: 'Supplier Current Status',
          fontSize: '13',
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
          },
          chartArea: {
            width: '80%', // Increase the width of the chart area
            height: '80%' // Increase the height of the chart area
          }
        };

        // Create a new piechart in the specified element
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        // Draw the chart with the defined data and options
        chart.draw(data, options);
      }

      // Callback function to draw the bar chart
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Pharmacies', <?php echo $data['countapprovedPharmacies']; ?>],
          ['Suppliers', <?php echo $data['countapprovedSuppliers']; ?>],
          ['Managers', <?php echo $data['countManagers']; ?>],
        ]);

        var options = {
          title: 'Counts of Users',
          fontSize: '12',
          hAxis: {
            title: 'Count',
            viewWindow: {
              min: [7, 30, 0],
              max: [17, 30, 0]
            }
          },
          vAxis: {
            title: 'Users'
          },
          isStacked: true
        };

        // Create a new barchart in the specified element
        var chart = new google.visualization.BarChart(document.getElementById('barchart1'));
        // Draw the chart with the defined data and options
        chart.draw(data, options);
      }
    </script>


    </div>
    </div>

  </body>

  </html>