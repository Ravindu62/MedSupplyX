<!DOCTYPE html>
<html lang="en">

<head>
    <title> Pharmacy Rejected Order </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php $pharmacyRejectedOrderDetails = $data['orderDetails']; ?>
    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Pharmacy Rejected Order </h2>
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
                                <p class="detailText"> <?php echo date('Y-m-d', strtotime($pharmacyRejectedOrderDetails->orderedDate)); ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Expected Delivery Date
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo date('Y-m-d', strtotime($pharmacyRejectedOrderDetails->deliveryDate)); ?> </p>
                            </td>
                        </tr>

                        <tr>
                            <td class="verticleCentered">
                                Order Accepted Date
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo date('Y-m-d', strtotime($pharmacyRejectedOrderDetails->acceptedDate)); ?> </p>
                            </td>
                            <td class="verticleCentered">
                                Date of the Bid
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo date('Y-m-d', strtotime($pharmacyRejectedOrderDetails->acceptedDate)); ?> </p>
                            </td>
                            <td class="verticleCentered">
                        </tr>

                        <tr>


                            <td class="verticleCentered">
                                Medicine Name
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->medicineName; ?> </p>
                            </td>


                        </tr>

                        <tr>
                            <td class="verticleCentered">
                                Category
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->category; ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Type
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->type; ?> </p>
                            </td>


                        </tr>

                        <tr>
                            <td class="verticleCentered">
                                Volume
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->volume; ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Brand
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->brand; ?> </p>
                            </td>


                        </tr>



                        <tr>
                            <td class="verticleCentered">
                                Quantity
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->quantity; ?> </p>
                            </td>

                            <td class="verticleCentered">
                                Bid Amount
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->bidAmount; ?> </p>
                            </td>
                        </tr>

                        <tr>
                        <tr>
                            <td class="verticleCentered">
                                Remarks
                            </td>
                            <td> : </td>
                            <td class="verticleCentered"> <?php echo $pharmacyRejectedOrderDetails->remarks; ?> </td>
                            </td>
                        </tr>
                        <tr>

                            <td class="verticleCentered">
                                Reply
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->reply; ?> </p>
                            </td>
                        </tr>
                        <tr>

                            <td class="verticleCentered">
                                Reason
                            </td>
                            <td> : </td>
                            <td class="verticleCentered">
                                <p class="detailText"> <?php echo $pharmacyRejectedOrderDetails->reason; ?> </p>
                            </td>
                        </tr>

                        <tr>
                            <td> <a href="<?php echo URLROOT ?>/pharmacies/showPharmacyRejectedOrderMedicineBrandDetails/ <?php echo $pharmacyRejectedOrderDetails->medicineName; ?>" class="link">
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