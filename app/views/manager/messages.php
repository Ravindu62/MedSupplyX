<!DOCTYPE html>
<html lang="en">
<head>
  <title> Messages </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
</head>
<body>
  <?php require APPROOT . '/views/inc/header.php'; ?>
  <?php require APPROOT . '/views/inc/manager_sidebar.php'; ?>
  <!-- content -->
  <div class="content">
    <div class="horizontaltab2">
      <button class="tablinks active" onclick="openEvent(event, 'inbox')"> <i class='far fa-comments' style='font-size:18px'> </i> INBOX </button>
      <button class="tablinks" onclick="openEvent(event, 'sentbox')"> <i class="fa-solid fa-message" style='font-size:18px'></i> SENTBOX </button>
    </div>
    <div id="inbox" class="tabcontent">
      <div class="anim">
        <button class="open-button" onclick="openForm()"> Open New Message </button>
      </div>
      <div class="middlespace"></div>
      <h2> Messages </h2>
      <div class="container-custom">
        <div class="card-custom">
          <div class="header-custom">
            <p> <b> John Doe : </b>
              new friend request </p>
          </div>
          <div class="content-custom">
            <p> CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p>
          </div>
        </div>
      </div>
    </div>
    <div id="sentbox" class="tabcontent">
      <h2> Your Message </h2>
      <div class="container-custom">
        <div class="card-custom">
          <div class="header-custom">
            <p> <b> John Doe : </b>
              new friend request </p>
          </div>
          <div class="content-custom">
            <p> CEO at Mighty Schools. Marketing and Advertising. Seeking a new job and new opportunities.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="chat-popup" id="myForm">
      <form action="" class="form-container">
        <div>
          <label for="msg"> <b> To :- </b> </label>
          <select class="dropdown" required>
            <option value="0"> Select the person </option>
            <option value="2"> administrator </option>
          </select>
        </div>
        <br>
        <label for="msg"> <b> Heading </b> </label>
        <input class="bar" type="text" placeholder="What's about..." name="msg" required>
        <br>
        <br>
        <label for="msg"> <b> Message </b> </label>
        <textarea placeholder="Type message.." name="msg" required></textarea>
        <button type="submit" class="btn"> Send </button>
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
      function openEvent(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        if (evt) evt.currentTarget.className += " active";
        else document.querySelector('button.tablinks').className += " active";
      }
      document.body.addEventListener('DOMContentLoaded', openEvent(event, 'inbox'));
    </script>
  </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>
</html>