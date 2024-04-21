<!DOCTYPE html>
<html lang="en">

<head>
    <title> Your Rejected Orders </title>
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

        <div class="smallspace"></div>

        <div class="anim">
            <h2> Your Rejected Orders </h2>
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

                <?php foreach ($data['rejectedOrders'] as $rejectedOrders) : ?>
                    <tr>
                        <td> <?php echo $rejectedOrders->medicine_name; ?> </td>
                        <td> <?php echo $rejectedOrders->batchno; ?> </td>
                        <td> <?php echo $rejectedOrders->quantity; ?> </td>
                        <td> <?php echo $rejectedOrders->ordered_date; ?> </td>
                        <td> <?php echo $rejectedOrders->deliveryDate; ?> </td>
                        <td> <?php echo $rejectedOrders->supplier_name; ?> </td>
                        <td> <?php echo $rejectedOrders->status; ?> </td>
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