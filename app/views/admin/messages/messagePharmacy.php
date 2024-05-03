<!DOCTYPE html>
<html lang="en">
<head>
  <title> Message with Pharmacy </title>
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <?php $pharmacy = $data['pharmacy']; ?>
    <?php $pharmacyDetails = $data['pharmacyDetails']; ?>

    <h2> Message with <?php echo $pharmacyDetails->name ?> </h2>
  </div>
  <div class="smallspace"></div>
 
  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex message">
        <form action="<?php echo URLROOT; ?>/admins/messagePharmacy/<?php echo $pharmacyDetails->id; ?>" method="post">
          <table>          
            <tr>
              <td class="verticleCentered">
               Pharmacy
              </td>
           
              <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $pharmacyDetails->name ?>" disabled> </td>
              <input type="hidden" name="pharmacyEmail" value="<?php echo $pharmacyDetails->email ?>">
            </tr>
            
            <tr>
              <td class="verticleCentered">
                 Topic 
              </td>
            </tr>
            <tr>
              <td class="verticleCentered" colspan="2"> <input type="text" name="topic" class="orderdetails2"> </td>
              <!-- <p class="importantMessage">   <?php echo $data['topic_err']; ?>        </p> -->
            </tr>
            
            <tr>    
              <td class="verticleCentered">
                 Description 
              </td>
            </tr>
            <tr>
              <td class="verticleCentered" colspan="2"> <input type="text" name="description" min="1" class="orderdetails3"> </td>
              <p class="importantMessage">   <?php echo $data['description_err']; ?>        </p>
            </tr>
            <tr>

              <td class="verticleCentered" colspan="4"> <input class="addBtn2" type="submit" value="Send">
                <a href="<?php echo URLROOT ?>/admins/messages" class="link">
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