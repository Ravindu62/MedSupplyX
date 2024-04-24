<!DOCTYPE html>
<html lang="en">   
<head> 
<title> Change Order Details </title>
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
      <h2> Change Order Details </h2>
    </div>
    <div class="smallspace"></div>
    <?php $order = $data['order']; ?>
    <?php $brand = $data['brand']; ?>
    <input type="hidden" name="id" value="<?php echo $order->id ?>">
    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
          <!-- //display  errors -->
          <form action="<?php echo URLROOT; ?>/pharmacies/changeOrderDetails/<?php echo $order->id; ?>" method="POST" class="orderform">
            <table>
              <tr>
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Medicine Name :
                </td>
                <td class="verticleCentered"> <input type="text" class="orderdetails" value="<?php echo $order->medicine_name ?>" disabled> </td>
                <input type="hidden" name="medicineName" class="orderdetails" value="<?php echo$order->medicine_name ?>">
                <input type="hidden" name="medicineId" class="orderdetails" value="<?php echo$order->medicine_id ?>">
                <td class="verticleCentered">
                  <span> Ref Number :
                </td>
                <td class="verticleCentered"><input type="text" class="smallForm" value="<?php echo $order->refNo ?>" disabled> </td>
                <input type="hidden" name="refNo" class="smallForm" value="<?php echo $order->refNo ?>">
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Category :
                </td>
                <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $order->category ?>" disabled> </td>
                <input type="hidden" name="category" class="smallForm" value="<?php echo $order->category ?>">
                <td class="verticleCentered">
                  <span> Type :
                </td>
                <td class="verticleCentered"><input type="text" class="orderdetails" value="<?php echo $order->type ?>" disabled> </td>
                <input type="hidden" name="type" class="orderdetails" value="<?php echo $order->type ?>">
              </tr>
              <tr>
                <td class="verticleCentered">
                  <span> Volume :
                </td>
                <td class="verticleCentered"> <input type="number" class="orderdetails" value="<?php echo $order->volume ?>" disabled> </td>
                <input type="hidden" name="volume" class="orderdetails" value="<?php echo $order->volume ?>">
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
                <td class="verticleCentered" colspan="4"> <input class="addBtn-submit" type="submit" value="Change Order">
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

