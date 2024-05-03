<!DOCTYPE html>
<html lang="en">

<head>
  <title> Registered Managers </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

  <!-- content -->
  <div class="content">
    <h2 class="anim">Managers</h2>
    <p class="anim">Here are all the Managers who registered to the MedSupplyX</p>

    

    <div class="anim">
      <table class="customers">
        <tr>
          <th></th>
          <th>Manager Name</th>
          <th>Physical Address</th>
          <th>Contact No</th>
          <th>Email</th>
          <th>Action</th>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <!-- Loop through each manager to display their information -->
        <?php foreach ($data['managers'] as $manager) : ?>
          <tr>
            <td></td>
            <td><?php echo $manager->name; ?></td>
            <td><?php echo $manager->address; ?></td>
            <td><?php echo $manager->phone; ?></td>
            <td><?php echo $manager->email; ?></td>
            <td>
              <!-- Button to update manager -->
              <a href="#popup"><button type="button" class="smallOpen-button">Update</button></a>
              <br><br>
              <!-- Form to delete manager -->
              <form action="<?php echo URLROOT; ?>/admins/deleteManager/<?php echo $manager->id; ?>" method="POST">
                <input type="submit" class="smallOpen-button-red" name="delete" value="Delete">
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

      <!-- Popup for updating manager -->
      <?php foreach ($data['managers'] as $manager) : ?>
        <div id="popup" class="overlay">
          <div class="popup-profile-change2">
           
            <!-- Form to update manager details -->
            <form action="<?php echo URLROOT; ?>/admins/updateManager/<?php echo $manager->id; ?>" method="POST" class="form-container" id="updateManagerForm">
              <h2>Update Manager</h2>
              <table>
                <tr>
                  <td>
                    <p class="editprofile-maintag">Manager Name</p>
                  </td>
                  <td>:</td>
                  <td><?php echo $manager->name ?></td>
                  <td>
                    <p class="editprofile-maintag">Update Name</p>
                  </td>
                  <td>:</td>
                  <td><input class="editprofile-input" type="text" placeholder="Enter New Name" name="newName"></td>
                </tr>
                <tr>
                  <td>
                    <p class="editprofile-maintag">Physical Address</p>
                  </td>
                  <td>:</td>
                  <td><?php echo $manager->address; ?></td>
                  <td>
                    <p class="editprofile-maintag">Update Address</p>
                  </td>
                  <td>:</td>
                  <td><input class="editprofile-input" type="text" placeholder="Enter New Address" name="newAddress"></td>
                </tr>
                <tr>
                  <td>
                    <p class="editprofile-maintag">Contact Info</p>
                  </td>
                  <td>:</td>
                  <td><?php echo $manager->phone; ?></td>
                  <td>
                    <p class="editprofile-maintag">Update Contact Info</p>
                  </td>
                  <td>:</td>
                  <td><input class="editprofile-input" type="text" placeholder="Enter New Contact Info" name="newPhone"></td>
                </tr>
              </table>
              <!-- Buttons to update or close the popup -->
              <div class="editprofile-btnsetup">
                <a href="<?php echo URLROOT; ?>/admins/updateManager"><button type="submit" class="editprofile-updatebutton">Update Manager</button></a>
                <a href="<?php echo URLROOT; ?>/admins/managers"><button type="button" class="editprofile-button-red">Close</button></a>
              </div>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
  </div>
  <script>
    document.getElementById("updateManagerForm").addEventListener("submit", function(event) {
      event.preventDefault();

      fetch(this.action, {
          method: 'POST',
          body: new FormData(this)
        })
        .then(response => {
          if (response.ok) {
            // If response is successful, close the popup
            closePopup('popup');
            // Redirect to /admins/profile
            window.location.href = "<?php echo URLROOT; ?>/admins/managers";
          } else {
            // If there's an error response, open the popup and display the error message
            response.text().then(errorMessage => {
              document.getElementById('popup-message').innerText = errorMessage;
              openPopup('popup', errorMessage);
            });
          }
        })
        .catch(error => {
          // Handle any errors
          console.error('Error:', error);
        });
    });

    // Define openPopup and closePopup functions
    function openPopup(popupId, message) {
      document.getElementById(popupId).style.display = "block";
      document.getElementById(popupId + "-message").innerText = message;
    }

    function closePopup(popupId) {
      document.getElementById(popupId).style.display = "none";
    }
  </script>
</body>

</html>