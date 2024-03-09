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

<?php require APPROOT . '/views/inc/cashier_sidebar.php'; ?>



<!-- content -->
  <div class="content">

    <h2 class="anim"> Dashboard</h2>
    <p class="anim"> Here are the important details.</p>
    <br>
    
    <div class="row">
      <div class="columnBig">
        <div class="card1">
          <h3> 0 </h3>
          <p> Expired Medicines </p>
        </div>
      </div>
    
      <div class="columnBig">
        <div class="card2">
          <h3> 0 </h3>
          <p> Out of Stock Meidicines  </p>
        </div>
      </div>
      </div>
 

    
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

</body>
</html>

