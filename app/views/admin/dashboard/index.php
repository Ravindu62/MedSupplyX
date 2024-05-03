<DOCTYPE html>
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
		text: "Pharmacies Status"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		toolTipContent: "{y} (#percent%)",
		indexLabel: "{label} #percent%",
		dataPoints: [
			{y: <?php echo $data['countrejectedPharmacies']; ?>, label: "Rejected Pharmacy", color:"#ff0000"},
			{y: <?php echo $data['countapprovedPharmacies']; ?>, label: "Approved Pharmacies", color:"#94F5FF"},
      {y: <?php echo $data['countpendingPharmacies']; ?>, label: "Pending Pharmacies", color:"#C1FFFE"}
			
		
		]
	}]
});
chart.render();


var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	title: {
		text: "suppliers Status"
      },
        data: [{
              type: "pie",
              startAngle: 240,
              toolTipContent: "{y} (#percent%)",
              indexLabel: "{label} #percent%",
              dataPoints: [
              {y: <?php echo $data['countrejectedSuppliers']; ?>, label: "Rejected Suppliers" , color:"#C1FFFE"},
              {y: <?php echo $data['countapprovedSuppliers']; ?>, label: "Approved Suppliers", color:"#94F5FF"},
              {y: <?php echo $data['countpendingSuppliers']; ?>, label: "Pending Suppliers", color:"#00607f"}


              ]
        }]
});
chart.render();


var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,	
	title: {
		text:"Count of Pharmacies and Suppliers"
	},
	axisX: {
		interval: 1
	},
	axisY2: {
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		title: "Number of Users"
	},
	data: [{
		type: "bar",
		name: "companies",
		color: "#014D65",
		axisYType: "secondary",
		dataPoints: [
			{ y: <?php echo $data['countPharmacies']; ?>, label: "Pharmacy" },
      { y: <?php echo $data['countSuppliers']; ?>, label: "Supplier" },
			
		]
	}]
});
chart.render();

}




   
	

</script>

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

     
    <div class="middlespace"></div>

    <!-- Load Google Charts -->
 

 
     <div id="chartContainer" style="height: 300px; width: 50%;float:left;"></div>
     <div id="chartContainer1" style="height: 300px; width: 50%;"></div>
     <div id="chartContainer2" style="height: 300px; width: 100%;"> </div>



    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>
  </body>

  </html>