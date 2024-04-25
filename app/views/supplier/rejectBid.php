<!DOCTYPE html>
<html lang="en">

<head>
    <title> Reject Order </title>
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
    <?php $approvedOrderDetails = $data['orderDetails']; ?>

    <?php require APPROOT . '/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
    <!-- content -->
    <div class="content">
        <div class="anim">
            <h2> Reject Order </h2>
        </div>
        <div class="smallspace"></div>
        <div class="anim">
            <div class="container-fluid">
                <div class="d-flex">
                    <form action="<?php echo URLROOT; ?>/suppliers/rejectBid/<?php echo $approvedOrderDetails->id ?>" method="post">
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
                                    <p class="detailText"> <?php echo date('Y-m-d', strtotime($approvedOrderDetails->orderedDate)); ?> </p>
                                </td>

                                <td class="verticleCentered">
                                    Delivery Needed Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo date('Y-m-d', strtotime($approvedOrderDetails->deliveryDate)); ?> </p>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                    Approved Date
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo date('Y-m-d', strtotime($approvedOrderDetails->approvedDate)); ?> </p>
                                </td>

                                <td class="verticleCentered">
                                    Date of the Bid
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo date('Y-m-d', strtotime($approvedOrderDetails->acceptedDate)); ?> </p>
                                </td>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Pharmacy Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->pharmacyName; ?> </p>
                                </td>

                                <td class="verticleCentered">
                                    Medicine Name
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->medicineName; ?> </p>
                                </td>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Category
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->category; ?> </p>
                                </td>

                                <td class="verticleCentered">
                                    Type
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->type; ?> </p>
                                </td>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Volume
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->volume; ?> </p>
                                </td>

                                <td class="verticleCentered">
                                    Brand
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->brand; ?> </p>
                                </td>


                            </tr>

                            <tr>
                                <td class="verticleCentered">
                                    Quantity
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->quantity; ?> </p>
                                </td>

                                <td class="verticleCentered">
                                    Bid Amount
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->bidAmount; ?> </p>
                                </td>
                            </tr>

                            <tr>
                            <tr>
                                <td class="verticleCentered">
                                    Remarks
                                </td>
                                <td> : </td>
                                <td class="verticleCentered"> <?php echo $approvedOrderDetails->remarks; ?> </td>
                                </td>
                            </tr>
                            <tr>

                                <td class="verticleCentered">
                                    Reply
                                </td>
                                <td> : </td>
                                <td class="verticleCentered">
                                    <p class="detailText"> <?php echo $approvedOrderDetails->reply; ?> </p>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td colspan="2">
                                    <h3> <br> Provide Reason </h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="verticleCentered">
                                <textarea name="reason" class="orderdetails" rows="4" cols="50"></textarea>
                                    <?php if (isset($data['reason_err'])) : ?>
                                        <p><?php echo $data['reason_err']; ?></p>
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="verticleCentered"> <input type="submit" class="addBtn" value="Reject"> </td>

                                <td class="verticleCentered"> <a href="<?php echo URLROOT ?>/suppliers/orders" class="link">
                                        <div class="publicbtn"> Back </div>
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