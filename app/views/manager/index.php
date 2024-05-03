<DOCTYPE html>
  <html lang="en">
  <head>
    <title> Dashboard </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">

<script>
window.onload = function() {

// pie chart
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Registered Users"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		toolTipContent: "{y} (#percent%)",
		indexLabel: "{label} #percent%",
		dataPoints: [
			{y: <?php echo $data['countPharmacies']; ?>, label: "Pharmacies", color:"#00607f"},
			{y: <?php echo $data['countSuppliers']; ?> , label: "Suppliers", color:"#94F5FF"}
		]
	}]
});
chart.render();

// bar chart
var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2", // 
	title:{
		text: "Count of Registered Users"
	},
	axisY: {
		title: "Count"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Types",
		dataPoints: [      
			{ y: <?php echo $data['countPharmacies']; ?>, label: "Registered Pharmacies", color: "#00B2FF"},
			{ y: <?php echo $data['countSuppliers']; ?>,  label: "Registered Suppliers" , color: "#7760E1"}
	
		]
	}]
});
chart.render();

}
</script>
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
          <a href="<?php echo URLROOT; ?>/managers/all_pharmacies" class="nodec">
          <div class="card1">
            <h3>
              <?php echo $data['countPharmacies']; ?>
            </h3>
            <p> Pharmacies </p>
          </div>
        </a>
        </div>
        <div class="column">
          <a href="<?php echo URLROOT; ?>/managers/all_suppliers" class="nodec">
          <div class="card2">
            <h3> <?php echo $data['countSuppliers']; ?> </h3>
            <p> Suppliers </p>
          </div>
        </a>
        </div>
        <div class="column">
          <a href="<?php echo URLROOT; ?>/managers/medicines" class="nodec">
          <div class="card3">
            <h3> <?php echo $data['countMedicines']; ?> </h3>
            <p> Registered Medicines </p>
          </div>
        </a>
        </div>
        <div class="column">
          <a href="<?php echo URLROOT; ?>/managers/registration" class="nodec">
          <div class="card4">
            <h3> <?php echo $data['countRequests']; ?> </h3>
            <p> Requests </p>
          </div>
        </a>
        </div>
      </div>
      <div class="smallspace"></div>
      <div class="chartbackground">
        <div class="anim">
        <div class="middlespace"></div>

        <div id="chartContainer" style="height: 300px; width: 50%;border:1px solid black;float:left;"></div>
        <div id="chartContainer1" style="height: 300px; width: 50%;"></div>

        
        </div>
      </div>
    </div>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>



    
  

  </body>
  </html>