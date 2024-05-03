<!DOCTYPE html>
<html lang="en">
<head>
  <title> New Mediine </title>
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/supplier_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <h2> Register a new medicine </h2>
  </div>
  <div class="smallspace"></div>
  <?php $getMessageData = $data['getMessageData']; ?>

  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex">
        <form action="<?php echo URLROOT; ?>/suppliers/sendMessage/<?php echo $getMessageData->id; ?>" method="post">
          <table>
            <tr>
              <td colspan="2">
                <h3> <br> <br> Message </h3>
              </td>
            </tr>
            <p class="importantMessage"> <?php echo $data['message_err']; ?> </p>
            <tr>
              <td class="verticleCentered">
                <span> Sender :
              </td>
              <td class="verticleCentered"> <input type="text" name="mname" class="orderdetails" value="<?php echo $getMessageData->sender ?>" disabled> </td>
          
              </tr>

              <tr>
              <td class="verticleCentered">
                <span> Heading :
              </td>
              <td class="verticleCentered"> <input type="text" name="mname" class="orderdetails2" value="<?php echo $getMessageData->heading ?>" disabled> </td>
          
              </tr>
        
              <td class="verticleCentered">
                <span> Message :
              </td>
              <td class="verticleCentered" colspan="3"> <input type="text" class="orderdetails2" name="message" placeholder="Type Message..."> </td>
            </tr>
           
            <tr>
            <input type="hidden" name="id" value="<?php echo $_SESSION['USER_DATA']['id'] ?>">
            <input type="hidden" name="sender" value="<?php echo $_SESSION['USER_DATA']['name'] ?>">
            <input type="hidden" name="pharmacyId" value="<?php echo $getMessageData->pharmacyId ?>">
            <input type="hidden" name="receiver" value="<?php echo $getMessageData->sender ?>">
            <input type="hidden" name="heading" value="<?php echo $getMessageData->heading ?>">
              <td class="verticleCentered" colspan="4"> 
                <input class="addBtn2" type="submit" value="Send Message">
                <a href="<?php echo URLROOT ?>/managers/messages" class="link">
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