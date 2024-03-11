<!DOCTYPE html>
<html lang="en">

<head>
    <title> Your Ongoing Orders </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


    <?php require APPROOT . '/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

    <!-- content -->
    <div class="content">

        <div class="smallspace"></div>

        <div class="anim">
            <h2> Your Ongoing Orders </h2>
        </div>



        <div class="anim">
            <table class="customers">
                <tr>
                    <th> Medicine Name </th>
                    <th> Batch No </th>
                    <th> Quantity </th>
                    <th> Ordered Date </th>
                    <th> Delivery Date </th>
                    <th> Suppliers </th>
                    <th> Status </th>
                </tr>

                <?php foreach ($data['order'] as $order) : ?>
                    <tr>
                        <td> <?php echo $order->medicine_name; ?> </td>
                        <td> <?php echo $order->batchno; ?> </td>
                        <td> <?php echo $order->quantity; ?> </td>
                        <td> <?php echo $order->ordered_date; ?> </td>
                        <td> <?php echo $order->deliveryDate; ?> </td>
                        <td> <?php echo $order->supplier_name; ?> </td>
                        <td> <?php echo $order->status; ?> </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>