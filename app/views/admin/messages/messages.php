<!DOCTYPE html>
<html lang="en">

<head>
  <title> Message </title>
  <meta charset="utf-8">
  <link rel="icon" href="<?php echo URLROOT ?>/public/img/logo3.png" type="image/gif" sizes="20x16">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>

<body>


  <?php require APPROOT . '/views/inc/header.php'; ?>

  <?php require APPROOT . '/views/inc/admin_sidebar.php'; ?>

  <!-- content -->
  <div class="content">
    <div class="horizontaltab">
      <button class="tablinks" onclick="startEvent(event, 'inbox')"> <i class='far fa-comments' style='font-size:18px'> </i> INBOX </button>
      <button class="tablinks" onclick="startEvent(event, 'sentbox')"> <i class="fa-solid fa-message" style='font-size:18px'></i> SENTBOX </button>
      <button class="tablinks active" onclick="toggleTab('messages')"> <i class="fa-solid fa-envelope" style='font-size:18px'></i> MESSAGE</button>

      <div id="messages" class="horizontaltab2" style="display: none;">
        <button class="tablinks" onclick="startEvent(event, 'pharmacies')" data-parenttab="messages"><i class="fa-solid fa-prescription-bottle-medical" style="font-size:16px"></i> PHARMACIES</button>
        <button class="tablinks" onclick="startEvent(event, 'suppliers')" data-parenttab="messages"><i class="fa-solid fa-truck-ramp-box" style="font-size:16px"></i> SUPPLIERS</button>
      </div>
    </div>

    <div id="inbox" class="tabcontent">
      <div class="anim">
        <br>
        <h2> Inbox Messages </h2>
      </div>


      <br>

      <div class="anim">
        <table class="customers">
          <tr>
            <th> Sent By </th>
            <th> Topic </th>
            <th> Message </th>
            <th> Date </th>
          </tr>

          <?php foreach ($data['inboxMessages'] as $inboxMessages) : ?>
            <tr>
              <td> <?php echo $inboxMessages->sender; ?> </td>
              <td> <?php echo $inboxMessages->heading; ?> </td>
              <td> <?php echo $inboxMessages->message; ?> </td>
              <td> <?php echo date('Y-m-d', strtotime($inboxMessages->createdDate)); ?> </td>
            </tr>
          <?php endforeach; ?>

        </table>
      </div>
    </div>

    <div id="pharmacies" class="tabcontent">
      <div class="anim">
        <br>
        <h2> Select Pharmacy </h2>
        <div class="anim">
          <button class="open-button" onclick="openForm()"> Open New Message </button>
          <br>
        </div>
        <div class="middlespace"></div>
        <br>

        <div class="anim">
          <table class="customers" id="pharmacyTable">
            <tr>
              <th> Pharmacy</th>
              <th> Email </th>
              <th> Address </th>
              <th> Phone </th>
            </tr>

            <?php foreach ($data['pharmacy'] as $pharmacy) : ?>
              <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/messagePharmacy/<?php echo $pharmacy->id; ?>'>
                <td> <?php echo $pharmacy->name; ?> </td>
                <td> <?php echo $pharmacy->email; ?> </td>
                <td> <?php echo $pharmacy->address; ?> </td>
                <td> <?php echo $pharmacy->phone; ?> </td>
              </tr>
            <?php endforeach; ?>

          </table>
        </div>
      </div>
    </div>

    <div id="suppliers" class="tabcontent">
      <div class="anim">
        <br>
        <h2> Select Supplier </h2>
        <div class="anim">
          <button class="open-button" onclick="openForm()"> Open New Message </button>
          <br>
        </div>
        <div class="middlespace"></div>
        <br>

        <div class="anim">
          <table class="customers">
            <tr>
              <th> Supplier </th>
              <th> Email </th>
              <th> Address </th>
              <th> Phone </th>
            </tr>

            <?php foreach ($data['supplier'] as $supplier) : ?>
              <tr onclick=window.location.href='<?php echo URLROOT; ?>/admins/messageSupplier/<?php echo $supplier->id; ?>'>
                <td> <?php echo $supplier->name; ?> </td>
                <td> <?php echo $supplier->email; ?> </td>
                <td> <?php echo $supplier->address; ?> </td>
                <td> <?php echo $supplier->phone; ?> </td>
              </tr>
            <?php endforeach; ?>

          </table>
        </div>
      </div>
    </div>


    <div id="sentbox" class="tabcontent">
      <div class="anim">
        <br>
        <h2> Send Messages </h2>
      </div>
      <br>

      <div class="anim">
        <table class="customers">
          <tr>
            <th> Sent to </th>
            <th> Topic </th>
            <th> Message </th>
            <th> Date </th>
          </tr>

          <?php foreach ($data['sentMessages'] as $sentMessages) : ?>
            <tr>
              <td> <?php echo $sentMessages->receiver; ?> </td>
              <td> <?php echo $sentMessages->heading; ?> </td>
              <td> <?php echo $sentMessages->message; ?> </td>
              <td> <?php echo date('Y-M-d', strtotime($sentMessages->createdDate)); ?> </td>
            </tr>
          <?php endforeach; ?>

        </table>
      </div>
    </div>
  </div>

  <div class="chat-popup" id="myForm">
    <form action="<?php echo URLROOT; ?>/admins/newMessage" method="POST" class=" form-container">

      <div>
        <label for="receiver"> <b> To :- </b> </label>
        <select class="dropdown" name="receiver" required>
          <option value="0"> Select the person </option>
          <option value="manager"> Manager </option>
        </select>
      </div>

      <br>
      <label for="heading"> <b> Heading </b> </label>
      <input class="bar" type="text" placeholder="What's about..." name="heading" required>

      <br>
      <br>
      <label for="message"> <b> Message </b> </label>
      <textarea placeholder="Type message.." name="message" required></textarea>


      <button type="submit" class="btn">Send</button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>

  <script>
    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }

    function toggleTab(tabName) {
    // Hide all tab content
    var tabContents = document.getElementsByClassName("horizontaltab2");
    for (var i = 0; i < tabContents.length; i++) {
        tabContents[i].style.display = "none";
    }

    // Remove the "active" class from all tab links
    var tabLinks = document.getElementsByClassName("tablinks");
    for (var i = 0; i < tabLinks.length; i++) {
        tabLinks[i].classList.remove("active");
    }

    // Show the selected tab content
    document.getElementById(tabName).style.display = "block";
    var activeTab = document.querySelector('.tablinks[data-tab="' + tabName + '"]');
    activeTab.classList.add("active");
}
    // Function to switch between tab content
    function startEvent(evt, cityName) {
      var i, tabcontent, tablinks;
      // Hide all tab content
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }

      // Remove the "active" class from all tab links
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }

      // Show the selected tab content
      document.getElementById(cityName).style.display = "block";
      // Add the "active" class to the clicked tab link
      if (evt) evt.currentTarget.className += " active";
      else {
        // If the function is called on page load, set the first tab link as active
        document.querySelector('button.tablinks').className += " active";
      }
    }
  </script>



  </div>
  </div>

  <?php require APPROOT . '/views/inc/footer.php'; ?>


</body>

</html>