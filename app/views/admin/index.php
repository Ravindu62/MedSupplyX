<DOCTYPE html>
<html lang="en">   
<head> 
<title> Dashboard </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>



<!-- content -->
  <div class="content">
      <h2 class="anim"> Dashboard</h2>
    <p class="anim"> Here are the important details.</p>
    <br><br>

    <div class="row">
      <div class="column" style="flex: 0.5; border:none;">
        <div class="card1" style= " width: 200px; height: 100px;">
          <h3> 
            <?php echo $data['countapprovedPharmacies']; ?>    
          </h3>
          <p>  Approved Pharmacies </p>
        </div>
      </div>
      
      <div class="column" style="flex: 0.5; margin-left:75px; border:none;">
        <div class="card2" style= "display: inline-block; width: 200px; height: 100px;">
          <h3> 
            <?php echo $data['countpendingPharmacies']; ?>    
          </h3>
          <p>  Pending Pharmacies </p>
        </div>
      </div>
      <div style="clear: both;"></div>
      <br>

      <div class="column" style="flex: 0.5; border:none;">
        <div class="card2" style= "width: 200px; height: 100px;">
          <h3> 
            <?php echo $data['countapprovedSuppliers']; ?> 
          </h3>
          <p>  Approved Suppliers </p>
        </div>
      </div>
      <div class="column" style="flex: 0.5; margin-left:75px; border:none;">
        <div class="card2" style= "display: inline-block; width: 200px; height: 100px;">
          <h3> 
            <?php echo $data['countpendingSuppliers']; ?> 
          </h3>
          <p>  Pending Suppliers </p>
        </div>
      </div>
      </div>
      <div style="clear: both;"></div>
      <br>

      <div class="column" style="flex: 0.5; border:none; ">
        <div class="card3" style= "width: 200px; height: 100px;">
          <h3> <?php echo $data['countManagers']; ?> </h3>
          <p>  Managers </p>
        </div>
      </div>
      <div class="column" style="flex: 0.5; margin-left:75px; border:none;">
        <div class="card3" style= "display: inline-block; width: 200px; height: 100px;">
          <h3> <?php echo $data['countOrders']; ?> </h3>
          <p>  TotalOrders </p>
        </div>
      </div>
      <div style="clear: both;"></div>
      <br>

      <div class="column" style= "flex: 1; margin-left:100px; border:none;">
        <div class="card4" style= "width: 200px; height: 100px;">
          <h3> <?php echo $data['countMessages']; ?></h3>
          <p> Messages </p>
        </div>
    </div>
    </div>
    <div class ="column" style="flex: 1; padding: 20px; border: 1px solid #ddd; margin: 0px; box-sizing: border-box;">
    <div class="space"></div>
      <div class="smallspace"></div>

      <div class="chartbackground">
        <div class="anim">
          <div id="piechart1" class="chart1"></div>
          <div id="barchart1" class="chart1" style= "margin-top: 20px; height: 250px; width: 500px;"></div>
        </div>
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
          ['Pending Pharmacies', <?php echo $data['countpendingPharmacies']; ?>],
          ['Approved Pharmacies', <?php echo $data['countapprovedPharmacies']; ?>],
          ['Pending Suppliers', <?php echo $data['countpendingSuppliers']; ?>],
          ['Approved Suppliers', <?php echo $data['countapprovedSuppliers']; ?>]
        ]);

        var options = {
          title: 'Current Status',
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
              width: '100%', // Increase the width of the chart area
              height: '100%' // Increase the height of the chart area
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
      }

      


      // Call the second chart function
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
            width: 10,
            height: 1200,
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

        var chart = new google.visualization.BarChart(document.getElementById('barchart1'));
        chart.draw(data, options);
      }

    </script>
     
    
</div>
</div>


</body>
</html>

