<!DOCTYPE html>
<html lang="en">
<head>
  <title> Remove Pharmacy </title>
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <h2> Manager Removing </h2>
  </div>
  <div class="smallspace"></div>
  <?php $getPharmacyDetails = $data['getPharmacyDetails']; ?>

  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/managers/deletepharmacy/<?php echo $getPharmacyDetails->id; ?>" method="post">
          <table>
            <tr>
              <td colspan="2">
                <h3> <br> <br> Pharmacy Licence No: <?php echo $getPharmacyDetails->licenceno ?> </h3>
              </td>
            </tr>
            <p class="importantMessage"> <?php echo $data['reason_err']; ?> </p>
            <tr>
              <td class="verticleCentered">
                <span> Pharmacy :
              </td>
              <td class="verticleCentered"> <input type="pharmacyname" name="mname" class="orderdetails" value="<?php echo $getPharmacyDetails->name ?>" disabled> </td>
              </tr>
              <tr>
              <td class="verticleCentered">
                <span> address :
              </td>
              <td class="verticleCentered"> <input type="pharmacyaddress" name="mname" class="orderdetails" value="<?php echo $getPharmacyDetails->address ?>" disabled> </td>
              </tr>
              <tr>
              <td class="verticleCentered">
                <span> Phone Number :
              </td>
              <td class="verticleCentered"> <input type="pharmacyphone" name="mname" class="orderdetails" value="<?php echo $getPharmacyDetails->phone ?>" disabled> </td>
              </tr>
              <tr>
              <td class="verticleCentered">
                <span> email :
              </td>
              <td class="verticleCentered"> <input type="text" name="pharmacyemail" class="orderdetails2" value="<?php echo $getPharmacyDetails->email ?>" disabled> </td>
          
              </tr>
        
              <td class="verticleCentered">
                <span> Reason  :
              </td>
              <td class="verticleCentered" colspan="3"> <input type="text" class="orderdetails2" name="reason" placeholder="Type Message..."> </td>
            </tr>
           
            <tr>
            
            <input type="hidden" name="id" value="<?php echo $getPharmacyDetails->id ?>">
        
              <td class="verticleCentered" colspan="4"> <input class="addBtn2" type="submit" value="Submit and Reject">
                <a href="<?php echo URLROOT ?>/managers/all_pharmacies" class="link">
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