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

  <?php require APPROOT . '/views/inc/pharmacy_sidebar.php'; ?>

  <!-- content -->
  <div class="content">
    <div class="horizontaltab">
      <button class="tablinks active" onclick="openEvent(event, 'message')"> <i class="fa-solid fa-envelope" style='font-size:18px'></i> MESSAGE </button>
      <button class="tablinks" onclick="openEvent(event, 'inbox')"> <i class='far fa-comments' style='font-size:18px'> </i> INBOX </button>
      <button class="tablinks" onclick="openEvent(event, 'sentbox')"> <i class="fa-solid fa-message" style='font-size:18px'></i> SENTBOX </button>
    </div>
    <div id="message" class="tabcontent">
      <div class="anim">
        <br>
        <h2> Select Supplier </h2>

        <br>

        <div class="anim">
          <table class="customers">
            <tr>
              <th> Supplier </th>
              <th> Email </th>
              <th> Address </th>
              <th> Phone </th>
            </tr>

            <?php foreach ($data['suppliers'] as $suppliers) : ?>
              <tr onclick=window.location.href='<?php echo URLROOT; ?>/pharmacies/messageSupplier/<?php echo $suppliers->id; ?>'>
                <td> <?php echo $suppliers->name; ?> </td>
                <td> <?php echo $suppliers->email; ?> </td>
                <td> <?php echo $suppliers->address; ?> </td>
                <td> <?php echo $suppliers->phone; ?> </td>
              </tr>
            <?php endforeach; ?>

          </table>
        </div>
      </div>
    </div>

    <div id="inbox" class="tabcontent">

      <div class="anim">
        <br>
        <h2> Messages </h2>
      </div>
      <div class="anim">
        <button class="open-button" onclick="openForm()"> Open New Message </button>
        <br>
      </div>
      <div class="middlespace"></div>

      <br>

      <div class="anim">
        <table class="customers">
          <tr>
            <th> Sender </th>
            <th> Heading </th>
            <th> Message </th>
            <th> Date </th>
          </tr>

          <?php foreach ($data['inboxmessages'] as $inboxmessages) : ?>
            <tr>
              <td> <?php echo $inboxmessages->sender; ?> </td>
              <td> <?php echo $inboxmessages->heading; ?> </td>
              <td> <?php echo $inboxmessages->message; ?> </td>
              <td> <?php echo date('Y-m-d', strtotime($inboxmessages->createdDate)); ?> </td>
            </tr>
          <?php endforeach; ?>

        </table>

    </div>
    </div>
    

      <div id="sentbox" class="tabcontent">
        <div class="anim">
          <br>
          <h2> Messages </h2>
        </div>
        <div class="anim">
          <button class="open-button" onclick="openForm()"> Open New Message </button>
          <br>
        </div>
        <div class="middlespace"></div>

        <br>

        <div class="anim">
          <table class="customers">
            <tr>
              <th> Receiver </th>
              <th> Heading </th>
              <th> Message </th>
              <th> Date </th>
            </tr>

            <?php foreach ($data['messages'] as $messages) : ?>
              <tr>
                <td> <?php echo $messages->receiver; ?> </td>
                <td> <?php echo $messages->heading; ?> </td>
                <td> <?php echo $messages->message; ?> </td>
                <td> <?php echo date('Y-m-d', strtotime($messages->createdDate)); ?> </td>
              </tr>
            <?php endforeach; ?>

          </table>
        </div>
      </div>
    </div>

    <div class="chat-popup" id="myForm">
      <form action="<?php echo URLROOT; ?>/pharmacies/newMessage" method="POST" " class=" form-container">

        <div>
          <label for="receiver"> <b> To :- </b> </label>
          <select class="dropdown" name="receiver" required>
            <option value="0"> Select the person </option>
            <option value="admin"> Administrator </option>
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
    </script>

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

