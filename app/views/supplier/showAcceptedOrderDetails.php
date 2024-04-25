<!DOCTYPE html>
<html lang="en">

<head>
  <title> Accepted Order </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
  <?php $acceptedOrderDetails = $data['orderDetails']; ?>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="anim">
      <h2> Accepted Order </h2>
    </div>
    <div class="smallspace"></div>
    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
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
                  <p class="detailText"> <?php echo date('Y-m-d', strtotime($acceptedOrderDetails->orderedDate)); ?> </p>
                </td>

                <td class="verticleCentered">
                  Delivery Needed Date
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo date('Y-m-d', strtotime($acceptedOrderDetails->deliveryDate)); ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Date of the Bid
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo date('Y-m-d', strtotime($acceptedOrderDetails->acceptedDate)); ?> </p>
                </td>

                <td class="verticleCentered">
                  Pharmacy Name
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->pharmacyName; ?> </p>
                </td>
              </tr>
             
              <tr>
                <td class="verticleCentered">
                  Medicine Name
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->medicineName; ?> </p>
                </td>

                <td class="verticleCentered">
                  Category
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->category; ?> </p>
                </td>
              </tr>
              
              <tr>
                <td class="verticleCentered">
                  Type
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->type; ?> </p>
                </td>

                <td class="verticleCentered">
                  Volume
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->volume; ?> </p>
                </td>
              </tr>
              
              <tr>
                <td class="verticleCentered">
                  Brand
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->brand; ?> </p>
                </td>

                <td class="verticleCentered">
                  Quantity
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->quantity; ?> </p>
                </td>
              </tr>
              
              <tr>
                <td class="verticleCentered">
                  Bid Amount
                </td>
                <td> : </td>
                <td class="verticleCentered">
                  <p class="detailText"> <?php echo $acceptedOrderDetails->bidAmount; ?> </p>
                </td>
              </tr>
              <tr>
                <td class="verticleCentered">
                  Remarks
                </td>
                <td> : </td>
                <td class="verticleCentered"> <?php echo $acceptedOrderDetails->remarks; ?> </td>
                </td>
              </tr>
          <tr>
            <td> <a href="<?php echo URLROOT ?>/supplier/orders" class="link">
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

