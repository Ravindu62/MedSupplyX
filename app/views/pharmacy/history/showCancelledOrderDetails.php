<!DOCTYPE html>
<html lang="en">

<head>
    <title> Cancelled Order </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php $cancelledOrderDetails = $data['orderDetails']; ?>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Cancelled Order </h2>
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
                                <p class="detailText"> <?php echo date('Y-m-d', strtotime($cancelledOrderDetails->createdAt)); ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Expected Delivery Date
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo date('Y-m-d', strtotime($cancelledOrderDetails->deliveryDate)); ?> </p>
                            </td>
                        </tr>


                        <tr>
            

                            <td class="verticleCentered">
                                Medicine Name
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $cancelledOrderDetails->medicine_name; ?> </p>
                            </td>


                        </tr>

                        <tr>
                            <td class="verticleCentered">
                                Category
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $cancelledOrderDetails->category; ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Type
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $cancelledOrderDetails->type; ?> </p>
                            </td>


                        </tr>

                        <tr>
                            <td class="verticleCentered">
                                Volume
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $cancelledOrderDetails->volume; ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Brand
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $cancelledOrderDetails->brand; ?> </p>
                            </td>


                        </tr>

                    

                        <tr>
                            <td class="verticleCentered">
                                Quantity
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $cancelledOrderDetails->quantity; ?> </p>
                            </td>

                        </tr>

                        <tr>
                    

                        <tr>
                            <td> <a href="<?php echo URLROOT ?>/pharmacies/showcancelledOrderMedicineBrandDetails/ <?php echo $cancelledOrderDetails->medicine_name; ?>" class="link">
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