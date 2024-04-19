<!DOCTYPE html>
<html lang="en">
<head>
  <title> Place New Order </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>
  <?php $request_order_details = $data['request_order_details']; ?>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="anim">
      <h2> Add Order </h2>
    </div>
    <div class="smallspace"></div>
    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
          <form action="<?php echo URLROOT; ?>/suppliers/acceptBid" method="POST" class="orderform">
            <table>
              <tr>
                <td colspan="2">
                  <h3> <br> Order Details </h3>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Pharmacy Name
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->pharmacyname; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Medicine Name
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->medicine_name; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Quantity
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->quantity; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Delivery Date
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->deliveryDate; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Place a Bid
                </td>
                <td> : </td>
                <td class="verticleCentered"> Rs. <input type="number" name="bid" class="orderdetails" required> </td>
                <td class="verticleCentered"> <button class="addBtn"> Place Bid </button> </td>
                <td class certicleCentered>
                  <p class="grey"> (Lowest Bid is )</p>
                </td>
              </tr>
              <input hidden name="medicineId" value="<?php echo $data['orderDetails']->medicineId; ?>">
              <input hidden name="pharmacyId" value="<?php echo $data['orderDetails']->pharmacyId; ?>">
              <input hidden name="pharmacyName" value="<?php echo $data['orderDetails']->pharmacyname; ?>">
              <input hidden name="medicineName" value="<?php echo $data['orderDetails']->medicine_name; ?>">
              <input hidden name="deliveryDate" value="<?php echo $data['orderDetails']->deliveryDate; ?>">
              <input hidden name="supplierId" value=" <?php echo $_SESSION['USER_DATA']['id']; ?>">
              <input hidden name="supplierName" value=" <?php echo $_SESSION['USER_DATA']['name']; ?>">
          </form>
          <tr>
            <td> <a href="<?php echo URLROOT ?>/suppliers/orders" class="link">
                <div class="publicbtn"> Cancel </div>
              </a>
            </td>
          </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>