<!DOCTYPE html>
<html lang="en">
<head>
  <title> Message with Supplier </title>
</head>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>
<!-- content -->
<div class="content">
  <div class="anim">
    <?php $supplier = $data['supplier']; ?>
    <?php $supplierDetails = $data['supplierDetails']; ?>

    <h2> Message with <?php echo $supplierDetails->name ?> </h2>
  </div>
  <div class="smallspace"></div>
 
  <div class="anim">
    <div class="container-fluid">
      <div class="d-flex message">
        <form action="<?php echo URLROOT; ?>/pharmacies/messageSupplier/<?php echo $supplier->id; ?>" method="post">
          <table>
            <tr>
              <td colspan="2">
               
              </td>
            </tr>
          
            <tr>
              <td class="verticleCentered">
                <span> Supplier : </span>
              </td>
              <td class="verticleCentered"> <input type="text" class="smallForm" value="<?php echo $supplierDetails->name ?>" disabled> </td>
              <input type="hidden" name="supplierEmail" value="<?php echo $supplierDetails->email ?>">
            <tr>
              <td class="verticleCentered">
                <span> Topic : </span>
              </td>
              <td class="verticleCentered"> <input type="text" name="topic" min="1" class="smallForm"> </td>
              <p class="importantMessage">   <?php echo $data['topic_err']; ?>        </p>
            </tr>
            <tr>    
              <td class="verticleCentered">
                <span> Description : </span>
              </td>
              <td class="verticleCentered"> <input type="text" name="description" min="1" class="smallForm"> </td>
              <p class="importantMessage">   <?php echo $data['description_err']; ?>        </p>
            </tr>
            <tr>

              <td class="verticleCentered" colspan="4"> <input class="addBtn" type="submit" value="Send">
                <a href="<?php echo URLROOT ?>/pharmacies/messages" class="link">
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