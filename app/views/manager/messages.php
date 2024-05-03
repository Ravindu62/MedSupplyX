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

      <button class="open-button" onclick="openForm()"> Open New Message </button>

      <div class="middlespace"></div>
      <h2> Messages </h2>

      <?php foreach ($data['getMessages'] as $getMessages) : ?>
        <div class="container-custom">
          <div class="card-custom">
            <div class="header-custom">
              <p><b><?php echo $getMessages->sender; ?>:</b> <?php echo $getMessages->heading; ?></p>
              <i class="displaydate"> <?php echo $getMessages->createdDate; ?> </i>
            </div>
            <div class="content-custom">
              <p><?php echo $getMessages->message; ?></p>
            </div>
            <div class="header-custom"><a class="replylink" href="<?php echo URLROOT; ?>/managers/sendMessage/<?php echo $getMessages->id; ?>">Reply</a></div>
          </div>
        </div>
      <?php endforeach; ?>


      <div class="chat-popup" id="myForm">
      <form action="<?php echo URLROOT; ?>/managers/messages" method="POST" " class=" form-container">
          <div>
            <label for="msg"><b>To:</b></label>
            <select class="dropdown" id="recipient" name="receiver" required>
              <option value="admin"> Administrator </option>
            </select>
          </div>
          <br>
          <label for="heading"><b>Heading:</b></label>
          <input class="bar" type="text" placeholder="What's about..." name="heading" required>
          <br><br>
          <label for="msg"><b>Message:</b></label>
          <textarea placeholder="Type message.." name="message" required></textarea>
          <button type="submit" class="btn">Send</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>




      <div id="sentbox" class="tabcontent">


        <div class="middlespace"></div>
        <h2> My Messages </h2>

        <?php foreach ($data['getMyMessageData'] as $getMyMessages) : ?>
          <div class="container-custom">
            <div class="card-custom">
              <div class="header-custom">
                <p><b><?php echo $getMyMessages->receiver; ?>:</b> <?php echo $getMyMessages->heading; ?></p>
              </div>
              <div class="content-custom">
                <p><?php echo $getMyMessages->message; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>


      </div>

    </div>

  </div>
    


    <script>
      function openForm(sender) {
        document.getElementById("myForm").style.display = "block";
        var select = document.getElementById("recipient");
        select.innerHTML = ""; // Clear previous options
        var option = document.createElement("option");
        option.text = sender;
        option.value = sender;
        select.add(option);
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
  
  <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>

</html>