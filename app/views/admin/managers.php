<DOCTYPE html>
<html lang="en">   
<head> 
<title> Inventory </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>


<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>


<!-- content -->
  <div class="content">
  
  
  <h2 class="anim"> Managers</h2>
  <p class="anim"> Here are all the Managers who registered to the MedSupplyX </p>

<div class="anim">    
<table class="customers">
  <tr>
    
    <th>  </th>
    <th> Manager Name </th>
    <th> Physical Address </th>
    <th> Contact No </th>
    <th> Email </th>
    <th> Action </th>
  </tr>
<tr> 
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td>
  <td> </td> 
  <td> <!-- <button class="smallOpen-button" onclick="openForm()"> Update </button> --> </td>
</tr>



<?php foreach($data['managers'] as $manager) : ?>
<tr> 
  <td>  </td>
  <td> <?php echo $manager->name; ?> </td>
  <td> <?php echo $manager->address; ?> </td>
  <td> <?php echo $manager->phone; ?> </td>
  <td> <?php echo $manager->email; ?> </td>
  
  






            <td><button type="submit" class="smallOpen-button" onclick="showForm(<?php echo $manager->id; ?>)">Update</button>
                <div id="formContainer<?php echo $manager->id; ?>" style="display:none;"><br>
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
         

            <br><br><form action="<?php echo URLROOT;?>/admins/deleteManager/<?php echo $manager->id; ?>" method="POST">
                  <input type="submit" class="smallOpen-button-red" name="delete" value="Delete">    
                </form> 
  </td>   


</tr>
<?php endforeach; ?>
</table>
    
</div>
</div>
</div>
</div>

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

