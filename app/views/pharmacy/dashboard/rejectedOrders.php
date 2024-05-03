<!DOCTYPE html>
<html lang="en">

<head>
    <title> Rejected Orders </title>
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
        <div class="alignRight">
            <a href="<?php echo URLROOT; ?>/pharmacies/index"> <button class="addBtn"> Back </button> </a>
        </div>
        <div class="smallspace"></div>

        <div class="anim">
            <h2> Rejected Orders </h2>
        </div>
<div class="middlespace"></div>


<div class="anim">
            <table class="customers">
                <tr>
                    <th> Suppliers </th>
                    <th> Medicine Name </th>
                    <th> Volume </th>
                    <th> Brand</th>
                    <th> Quantity </th>
                    <th> Reason </th>
                    <th> Status </th>
                </tr>

                <?php foreach ($data['rejectedOrders'] as $rejectedOrders  ) : ?>
                    <tr>
                        <td> <?php echo $rejectedOrders->supplierName; ?> </td>
                        <td> <?php echo $rejectedOrders->medicineName; ?> </td>
                        <td> <?php echo $rejectedOrders->volume . ' ' . $rejectedOrders->type; ?> </td>
                        <td> <?php echo $rejectedOrders->brand; ?> </td>
                        <td> <?php echo $rejectedOrders->quantity; ?> </td>
                        <td> <?php echo $rejectedOrders->reason; ?> </td>
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