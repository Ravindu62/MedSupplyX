<!DOCTYPE html>
<html lang="en">   
<head> 
<title> Submit Your Order </title>
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

    <div class="anim">
      <h2> Submit Your Order </h2>
    </div>
    <div class="smallspace"></div>
    <?php $medicine = $data['medicine']; ?>
    <?php $brand = $data['brand']; ?>
    <input type="hidden" name="medicineId" value="<?php echo $medicine->medicineId ?>">
    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
          <!-- //display  errors -->


          <form action="<?php echo URLROOT; ?>/pharmacies/submitOrder/<?php echo $medicine->medicineId; ?>" method="POST" class="orderform">
            <table>
              <tr>
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Medicine Name :
                </td>
                <td class="verticleCentered"> <input type="text" class="orderdetails" value="<?php echo $medicine->medicinename ?>" disabled> </td>
                <input type="hidden" name="medicineName" class="orderdetails" value="<?php echo $medicine->medicinename ?>">
                <td class="verticleCentered">
                  <span> Ref Number :
                </td>
                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $medicine->refno ?>" disabled> </td>
                <input type="hidden" name="refno" class="smallForm" value="<?php echo $medicine->refno ?>">
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Category :
                </td>
                <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $medicine->category ?>" disabled> </td>
                <input type="hidden" name="category" class="smallForm" value="<?php echo $medicine->category ?>">
                <td class="verticleCentered">
                  <span> Type :
                </td>
                <td class="verticleCentered"><input type="text" class="orderdetails" value="<?php echo $medicine->type ?>" disabled> </td>
                <input type="hidden" name="type" class="orderdetails" value="<?php echo $medicine->type ?>">
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Volume :
                </td>
                <td class="verticleCentered"> <input type="number" class="orderdetails" value="<?php echo $medicine->volume ?>" disabled> </td>
                <input type="hidden" name="volume" class="orderdetails" value="<?php echo $medicine->volume ?>">
                <td class="verticleCentered">
                  <span> Delivery Needed At :
                </td>
                <td class="verticleCentered"> <input type="date" name="deliveryDate" class="smallForm" min="100"> <br>
                <p class="importantMessage"> <?php echo $data['deliveryDate_err']; ?> </p>
              </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Available Brand:
                </td>
                <td class="verticleCentered">
                  <?php
                  $brands = array();
                  foreach ($data['brand'] as $brand) {
                    if ($brand->medicineId == $medicine->medicineId) {
                      $brands[] = $brand->brandname;
                    }
                  }
                  ?>
                  <select class="type" name="brand" class="orderdetails">
                    <?php foreach ($brands as $brand) : ?>
                      <option value="<?php echo $brand; ?>"> <?php echo $brand; ?> </option> 
                    <?php endforeach; ?> <br>
                 
                </td>
                </td>
                <td class="verticleCentered">
                  <span> Quantity:
                </td>
                <td class="verticleCentered"> <input type="number" name="quantity" min="1" class="orderdetails"><br>
                <p class="importantMessage"> <?php echo $data['quantity_err']; ?> </p>  </td>
               
          
              </tr>
              <tr>
                <td class="verticleCentered" colspan="4"> <input class="addBtn-submit" type="submit" value="Submit Order">
                  <a href="<?php echo URLROOT ?>/pharmacies/addOrder" class="link">
                    <div class="publicbtn"> Cancel </div>
                  </a>
                </td>
              </tr>

            </table>
          </form>
          <div class="smallspace"></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>

