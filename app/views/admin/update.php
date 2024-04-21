<!DOCTYPE html>
<html lang="en">
<head> <title> New Mediine </title>
</head>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

  <!-- content -->
  <div class="content">
    <div class="anim">
      <h2> Update Manager </h2>
    </div>
    <div class="smallspace"></div>

    <div class="anim">
      <div class="container-fluid">
        <div class="d-flex">
        <div id="formContainer<?php echo $manager->id; ?>"><br>
                    <form method="post" action="<?php echo URLROOT;?>/admins/updateManager/<?php echo $manager->id; ?>">
                      <label for="name">Name:</label><br>
                      <input type="text" id="name" name="name" value="<?php echo $manager->name; ?>"><br>
                      <label for="address">Address:</label><br>
                      <input type="text" id="address" name="address" value="<?php echo $manager->address; ?>"><br>
                      <label for="phone">Phone:</label><br>
                      <input type="text" id="phone" name="phone" value="<?php echo $manager->phone; ?>"><br>
                      <label for="email">Email:</label><br>
                      <input type="text" id="email" name="email" value="<?php echo $manager->email; ?>"><br><br>
                      <input type="submit" class="smallOpen-button" value="Submit">
                      <button type="button" class="smallOpen-button-red" onclick="hideForm(<?php echo $manager->id; ?>)">Cancel</button>
                    </form>
            </div> 
  </td>   



<script>
function showForm(id) {
    var formContainer = document.getElementById('formContainer' + id);
    formContainer.style.display = 'block';
  }

  function hideForm(id) {
    var formContainer = document.getElementById('formContainer' + id);
    formContainer.style.display = 'none';
  }

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>


</body>

</html>