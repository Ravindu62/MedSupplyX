<!DOCTYPE html>
<html lang="en">

<head>
  <title> Add Reply to Remarks </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
  <?php $acceptedOrderDetails = $data['orderDetails']; ?>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="anim">
      <h2>  Add Reply to Remarks  </h2>
    </div>
    <div class="smallspace"></div>
    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/pharmacies/addReplyToRemarks/<?php echo $acceptedOrderDetails->id ?>" method="POST">
          <table>
            <tr>
              <td colspan="2">
                <h3> <br> Order Details </h3>
              </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                Supplier
              </td>
              <td> : </td>
              <td class="verticleCentered">
                <p class="detailText"> <?php echo $acceptedOrderDetails->supplierName; ?> </p>
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
              <td class="verticleCentered">
                <p class="detailText"> <?php echo $acceptedOrderDetails->remarks; ?> </p>
              </td>
              </td>
            </tr>
            <tr>
              <td class="verticleCentered">
                Reply
              </td>
              <td> : </td>
              <td class="verticleCentered">
                <input type="text" name="reply" id="reply" class="orderdetails" placeholder="Enter your reply here">
              </td>
              <td class="verticleCentered"><p class="importantMessage"> <?php echo $data['reply_err'] ?></p></td>
              </td>
            </tr>
            <tr>
            <td class="verticleCentered"><input type="submit" class="addBtn" value="Add"></td>
              <td> <a href="<?php echo URLROOT ?>/pharmacies/showAcceptedOrderBrandDetails/<?php echo $acceptedOrderDetails->medicineName ?>" class="link">
                  <div class="publicbtn"> Cancel </div>
                </a>
              </td>
            </tr>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>