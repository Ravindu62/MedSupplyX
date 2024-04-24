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
          <form action="<?php echo URLROOT; ?>/suppliers/place_bid/<?php echo $request_order_details->id; ?>" method="post">
            <table>
              <tr>
                <td colspan="2">
                  <h3> <br> Order Details </h3>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Ordered Date
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo date('Y-m-d', strtotime($data['orderDetails']->createdAt)); ?> </p>
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
                  Category
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->category; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Type
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->type; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Volume
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->volume; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Brand
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $data['orderDetails']->brand; ?> </p>
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
              <input type="hidden" name="medicine_id" value="<?php echo $data['orderDetails']->medicine_id; ?>">
              <input type="hidden" name="pharmacyId" value="<?php echo $data['orderDetails']->pharmacy_id; ?>">
              <input type="hidden" name="orderId" value="<?php echo $data['orderDetails']->id; ?>">
              <input type="hidden" name="pharmacyName" value="<?php echo $data['orderDetails']->pharmacyname; ?>">
              <input type="hidden" name="category" value="<?php echo $data['orderDetails']->category; ?>">
              <input type="hidden" name="medicineName" value="<?php echo $data['orderDetails']->medicine_name; ?>"> 
              <input type="hidden" name="quantity" value="<?php echo $data['orderDetails']->quantity; ?>">
              <input type="hidden" name="type" value="<?php echo $data['orderDetails']->type; ?>">
              <input type="hidden" name="volume" value="<?php echo $data['orderDetails']->volume; ?>">
              <input type="hidden" name="brand" value="<?php echo $data['orderDetails']->brand; ?>">
              <input type="hidden" name="deliveryDate" value="<?php echo $data['orderDetails']->deliveryDate; ?>">
              <input type="hidden" name="supplierId" value="<?php echo $_SESSION['USER_DATA']['id']; ?>">
              <input type="hidden" name="supplierName" value="<?php echo $_SESSION['USER_DATA']['name']; ?>">
              <input type="hidden" name="orderedDate" value="<?php echo  $data['orderDetails']->createdAt; ?>">
              <tr>
                <td class="verticleCentered">
                  Place a Bid
                </td>
                <td> : </td>
                <td class="verticleCentered"> Rs. <input type="number" min="1" name="bidAmount" class="orderdetails"> </td>
                <td class="verticleCentered"> <input type="submit" class="addBtn" value="Place Bid"> </td>
                <p> <?php echo $data['bidAmount_err']; ?> </p>
                <td class certicleCentered>
                  <p class="grey"> (Lowest Bid is ) </p>
                </td>
              </tr>

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

