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

<?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>


<!-- content -->
  <div class="content">

    <h2 class="anim"> Dashboard</h2>
    <p class="anim"> Here are the important details.</p>
    <br>
    
    <div class="row">
      <div class="column">
        <div class="card1">
      <h3> 
      
      <?php echo $data['countPharmacies']; ?>
  
          </h3>
          <p>  Pharmacies </p>
        </div>
      </div>
    
      <div class="column">
        <div class="card2">
          <h3> <?php echo $data['countSuppliers']; ?> </h3>
          <p>  Suppliers </p>
        </div>
      </div>
      
      <div class="column">
        <div class="card3">
          <h3> <?php echo $data['countMedicines']; ?> </h3>
          <p>  Registered Medicines </p>
        </div>
      </div>
      
      <div class="column">
        <div class="card4">
          <h3> <?php echo $data['countRequests']; ?> </h3>
          <p> Requests </p>
        </div>
      </div>
    </div>
    <div class="smallspace"></div>
   
   <div class="chartbackground"> 
   <div class="anim"> <div id="piechart" class="chart1"></div> 
    <div id = "barchart" class="chart1"></div>
  </div> 
  </div>
  </div>
</div>




<?php require APPROOT . '/views/inc/footer.php'; ?>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Users', 'Percentage'],
          ['Pharmacies',      <?php echo $data['countPharmacies']; ?>],
          ['Suppliers',      <?php echo $data['countSuppliers']; ?>],
        ]);

        var options = {
          title: 'Registered Pharmacies and Suppliers',
          slices: {0: {color: '#00607f'}, 1:{color: '#006faf'}},
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }


        function drawChart1() {
            /* Define the chart to be drawn.*/
            var data = google.visualization.arrayToDataTable([
                ['Users', 'Count'],
                ['Pharmacies', <?php echo $data['countPharmacies']; ?>],
                ['Supppliers', <?php echo $data['countSuppliers']; ?>]
            ]);
            var options = {
                title: 'Registered User count of MedsupplyX',
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

