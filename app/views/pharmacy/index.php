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

<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>



<!-- content -->
  <div class="content">

    <h2 class="anim"> Dashboard</h2>
    <p class="anim"> Here are the important details.</p>
    <br>
    
    <div class="row">
      <div class="column">
        <div class="card1">
          <h3> 0 </h3>
          <p> Total Orders </p>
        </div>
      </div>
    
      <div class="column">
        <div class="card2">
          <h3> 0 </h3>
          <p> Total accepted orders </p>
        </div>
      </div>
      
      <div class="column">
        <div class="card3">
          <h3> 0 </h3>
          <p> Out of Stock Products </p>
        </div>
      </div>
      
      <div class="column">
        <div class="card4">
          <h3> 0 </h3>
          <p> Expired Products </p>
        </div>
      </div>
    </div>
    <div class ="space"></div>
    <div class="anim">  
    <div class="text_centered"> 
      <p> To get the report , click below button </p> 
</div>
<div class="centerbtn">
    <button class="downloadbtn"> Download Report </button>
    </div>
    </div>
    
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

</body>
</html>

