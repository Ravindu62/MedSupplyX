<!DOCTYPE html>
<html lang="en">

<head>
  <title> History </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

  <!-- content -->
  <div class="content">

    <div class="anim">
      <h2> Delivered Orders </h2>
    </div>

    <div class="anim">
      <table class="customers">
        <tr>
          <th class="custom1"> Medicine Id </th>
          <th class="custom1"> Medicine Name </th>
          <th class="custom1"> Batch No </th>
          <th class="custom1"> Category </th>
          <th class="custom1"> Quantity </th>
          <th class="custom1"> Ordered Date </th>
          <th class="custom1"> Delivered Date </th>
          <th class="custom1"> Supplier Name </th>
          <th class="custom1"> Price (LKR) </th>



        </tr>
        <?php foreach ($data['deliveredHistory'] as $deliveredOrders) : ?>
          <tr>
            <td> <?php echo $deliveredOrders->medicine_id; ?></td>
            <td> <?php echo $deliveredOrders->medicine_name; ?></td>
            <td> <?php echo $deliveredOrders->batchno; ?></td>
            <td> <?php echo $deliveredOrders->category; ?></td>
            <td> <?php echo $deliveredOrders->quantity; ?></td>
            <td> <?php echo $deliveredOrders->ordered_date; ?></td>
            <td> <?php echo $deliveredOrders->deliveryDate; ?></td>
            <td> <?php echo $deliveredOrders->supplier_name; ?></td>
            <td> <?php echo $deliveredOrders->price; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>



    <div class="space"></div>
    <div class="anim">
      <h2> Cancelled Orders (By You!) </h2>
    </div>
    <div class="anim">
      <table class="customers">
        <tr>
          <th class="custom3"> Medicine Id</th>
          <th class="custom3"> Medicine Name </th>
          <th class="custom3"> Supplier Name </th>
          <th class="custom3"> Batch No </th>
          <th class="custom3"> Category </th>
          <th class="custom3"> Quantity </th>
          <th class="custom3"> Reason for cancelling </th>

        </tr>
        <?php foreach ($data['canceledHistory'] as $canceledOrders) : ?>
          <tr>
            <td> <?php echo $canceledOrders->medicine_id; ?></td>
            <td> <?php echo $canceledOrders->medicine_name; ?></td>
            <td> <?php echo $canceledOrders->supplier_name; ?></td>
            <td> <?php echo $canceledOrders->batchno; ?></td>
            <td> <?php echo $canceledOrders->category; ?></td>
            <td> <?php echo $canceledOrders->quantity; ?></td>
            <td> <?php echo $canceledOrders->reason; ?></td>
          </tr>
        <?php endforeach; ?>

      </table>
    </div>

  </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>