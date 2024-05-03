<!DOCTYPE html>
<html lang="en">
<head>
  <title> Remove Supplier </title>
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <h2> Register a new medicine </h2>
  </div>
  <div class="smallspace"></div>
  <?php $getSupplierDetails = $data['getSupplierDetails']; ?>

  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/managers/deletesupplier/<?php echo $getSupplierDetails->id; ?>" method="post">
          <table>
            <tr>
              <td colspan="2">
                <h3> <br> <br> Supplier Licence No: <?php echo $getSupplierDetails->licenceno ?> </h3>
              </td>
            </tr>
            <p class="importantMessage"> <?php echo $data['reason_err']; ?> </p>
            <tr>
              <td class="verticleCentered">
                <span> Pharmacy :
              </td>
              <td class="verticleCentered"> <input type="pharmacyname" name="mname" class="orderdetails" value="<?php echo $getSupplierDetails->name ?>" disabled> </td>
              </tr>
              <tr>
              <td class="verticleCentered">
                <span> address :
              </td>
              <td class="verticleCentered"> <input type="pharmacyaddress" name="mname" class="orderdetails" value="<?php echo $getSupplierDetails->address ?>" disabled> </td>
              </tr>
              <tr>
              <td class="verticleCentered">
                <span> Phone Number :
              </td>
              <td class="verticleCentered"> <input type="pharmacyphone" name="mname" class="orderdetails" value="<?php echo $getSupplierDetails->phone ?>" disabled> </td>
              </tr>
              <tr>
              <td class="verticleCentered">
                <span> email :
              </td>
              <td class="verticleCentered"> <input type="text" name="pharmacyemail" class="orderdetails2" value="<?php echo $getSupplierDetails->email ?>" disabled> </td>
          
              </tr>
        
              <td class="verticleCentered">
                <span> Reason  :
              </td>
              <td class="verticleCentered" colspan="3"> <input type="text" class="orderdetails2" name="reason" placeholder="Type Message..."> </td>
            </tr>
           
            <tr>
            
            <input type="hidden" name="id" value="<?php echo $getSupplierDetails->id ?>">
        
              <td class="verticleCentered" colspan="4"> <input class="addBtn2" type="submit" value="Submit and Reject">
                <a href="<?php echo URLROOT ?>/managers/all_suppliers" class="link">
                  <div class="publicbtn"> Cancel </div>
                </a>
              </td>
            </tr>
          </table>
        </form>
        <div class="smallspace"></div>
      </div>
    </div>
  </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>